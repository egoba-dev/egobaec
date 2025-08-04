<?php

namespace Plugin\LeftTextBlock\Service;

use Plugin\LeftTextBlock\Entity\LeftTextBlock;
use Plugin\LeftTextBlock\Repository\LeftTextBlockRepository;
use Plugin\LeftTextBlock\PluginManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

class LeftTextBlockService
{
    private $entityManager;
    private $leftTextBlockRepository;
    private $container;
    
    // テキストブロックの上限数
    private const MAX_TEXT_BLOCKS = 50;

    public function __construct(
        EntityManagerInterface $entityManager,
        LeftTextBlockRepository $leftTextBlockRepository,
        ContainerInterface $container
    ) {
        $this->entityManager = $entityManager;
        $this->leftTextBlockRepository = $leftTextBlockRepository;
        $this->container = $container;
    }

    /**
     * テキストブロック作成時にブロックも作成
     */
    public function createTextBlock(LeftTextBlock $leftTextBlock)
    {
        // 上限チェック
        $currentCount = $this->leftTextBlockRepository->createQueryBuilder('ltb')
            ->select('COUNT(ltb.id)')
            ->getQuery()
            ->getSingleScalarResult();

        if ($currentCount >= self::MAX_TEXT_BLOCKS) {
            throw new \Exception('テキストブロックの上限(' . self::MAX_TEXT_BLOCKS . '個)に達しています。');
        }

        // 利用可能なIDを取得（削除されたIDを再利用）
        $availableId = $this->getAvailableId();
        
        if ($availableId) {
            // 特定のIDを指定してテキストブロックを作成
            $this->setEntityId($leftTextBlock, $availableId);
        }

        // テキストブロックを保存
        $this->entityManager->persist($leftTextBlock);
        $this->entityManager->flush();

        // 対応するブロックを作成
        $pluginManager = new PluginManager();
        $blockId = $pluginManager->createBlockForTextBlock(
            $this->container, 
            $leftTextBlock->getId(), 
            $leftTextBlock->getTitle()
        );

        error_log("LeftTextBlock: Created text block ID {$leftTextBlock->getId()} with block ID {$blockId}");
        
        return $leftTextBlock;
    }

    /**
     * テキストブロック更新時にブロック名も更新
     */
    public function updateTextBlock(LeftTextBlock $leftTextBlock)
    {
        $this->entityManager->persist($leftTextBlock);
        $this->entityManager->flush();

        // ブロック名を更新
        $this->updateBlockName($leftTextBlock->getId(), $leftTextBlock->getTitle());

        error_log("LeftTextBlock: Updated text block ID {$leftTextBlock->getId()}");
        
        return $leftTextBlock;
    }

    /**
     * テキストブロック削除時に論理削除を実行
     */
    public function deleteTextBlock(LeftTextBlock $leftTextBlock)
    {
        $textBlockId = $leftTextBlock->getId();
        
        // 論理削除を実行
        $leftTextBlock->delete();
        $leftTextBlock->setUpdateDate(new \DateTime());
        
        $this->entityManager->persist($leftTextBlock);
        $this->entityManager->flush();

        // dtb_blockからも削除（レイアウト管理から非表示にする）
        $pluginManager = new PluginManager();
        $pluginManager->removeBlockForTextBlock($this->container, $textBlockId);

        error_log("LeftTextBlock: Logically deleted text block ID {$textBlockId}");
    }

    /**
     * 利用可能な最小IDを取得（削除されたIDを再利用）
     */
    private function getAvailableId(): ?int
    {
        $connection = $this->entityManager->getConnection();
        
        // 1からMAX_TEXT_BLOCKSまでの範囲で、使用されていない最小のIDを取得
        for ($i = 1; $i <= self::MAX_TEXT_BLOCKS; $i++) {
            $exists = $connection->fetchOne(
                'SELECT COUNT(*) FROM plg_left_text_block WHERE id = ?',
                [$i]
            );
            
            if ($exists == 0) {
                return $i;
            }
        }
        
        return null; // 利用可能なIDがない
    }

    /**
     * EntityのIDを強制的に設定
     */
    private function setEntityId(LeftTextBlock $entity, int $id): void
    {
        $reflection = new \ReflectionClass($entity);
        $property = $reflection->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($entity, $id);
    }

    /**
     * ブロック名を更新
     */
    private function updateBlockName($textBlockId, $title)
    {
        try {
            $connection = $this->entityManager->getConnection();
            $fileName = "left_text_block_" . $textBlockId;
            $blockName = "左寄せテキスト: " . $title;
            
            $connection->executeStatement(
                'UPDATE dtb_block SET block_name = ?, update_date = ? WHERE file_name = ?',
                [$blockName, date('Y-m-d H:i:s'), $fileName]
            );
        } catch (\Exception $e) {
            error_log('LeftTextBlock: Block name update failed - ' . $e->getMessage());
        }
    }

    /**
     * 現在の使用状況を取得
     */
    public function getUsageInfo(): array
    {
        $currentCount = $this->leftTextBlockRepository->createQueryBuilder('ltb')
            ->select('COUNT(ltb.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $usedIds = $this->leftTextBlockRepository->createQueryBuilder('ltb')
            ->select('ltb.id')
            ->orderBy('ltb.id', 'ASC')
            ->getQuery()
            ->getArrayResult();

        return [
            'current_count' => $currentCount,
            'max_count' => self::MAX_TEXT_BLOCKS,
            'remaining' => self::MAX_TEXT_BLOCKS - $currentCount,
            'used_ids' => array_column($usedIds, 'id')
        ];
    }

    /**
     * 既存のテキストブロックに対してブロックを同期
     */
    public function syncBlocks()
    {
        $textBlocks = $this->leftTextBlockRepository->findAll();
        $pluginManager = new PluginManager();
        
        foreach ($textBlocks as $textBlock) {
            $pluginManager->createBlockForTextBlock(
                $this->container,
                $textBlock->getId(),
                $textBlock->getTitle()
            );
        }
        
        error_log("LeftTextBlock: Synced " . count($textBlocks) . " blocks");
    }
}