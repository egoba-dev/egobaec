<?php
namespace Plugin\Rental\TemplateHook\Admin;

use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductEditHook implements EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            '@admin/Product/product.twig' => ['onRenderAdminProduct'],
        ];
    }

    /**
     * 商品編集画面にレンタル設定欄を追加
     *
     * @param TemplateEvent $event
     */
    public function onRenderAdminProduct(TemplateEvent $event)
    {
        // 発送日目安の次にレンタル設定を追加
        $search = '<div class="row">
                                        <div class="col-3">
                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top"
                                                 title="{{ \'tooltip.product.delivery_duration\'|trans }}">
                                                <span>{{ \'admin.product.delivery_duration\'|trans }}</span>
                                                <i class="fa fa-question-circle fa-lg ms-1"></i>
                                            </div>
                                        </div>
                                        <div class="col mb-2">
                                            <div>
                                                {{ form_widget(form.class.delivery_duration) }}
                                                {{ form_errors(form.class.delivery_duration) }}
                                            </div>
                                        </div>
                                    </div>';
        
        $replace = $search . '
                                    <!-- レンタル設定 -->
                                    {% if form.rental_product is defined %}
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" 
                                                 title="{{ \'rental.admin.product.rental_flg_tooltip\'|trans }}">
                                                <span>{{ \'レンタル対象\'|trans }}</span>
                                                <i class="fa fa-question-circle fa-lg ms-1"></i>
                                            </div>
                                        </div>
                                        <div class="col mb-2">
                                            {{ form_widget(form.rental_product.rental_flg) }}
                                            {{ form_errors(form.rental_product.rental_flg) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="d-inline-block">
                                                <span>{{ \'日額レンタル料金\'|trans }}</span>
                                            </div>
                                        </div>
                                        <div class="col mb-2">
                                            {{ form_widget(form.rental_product.rental_price_daily) }}
                                            {{ form_errors(form.rental_product.rental_price_daily) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="d-inline-block">
                                                <span>{{ \'週額レンタル料金\'|trans }}</span>
                                            </div>
                                        </div>
                                        <div class="col mb-2">
                                            {{ form_widget(form.rental_product.rental_price_weekly) }}
                                            {{ form_errors(form.rental_product.rental_price_weekly) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="d-inline-block">
                                                <span>{{ \'月額レンタル料金\'|trans }}</span>
                                            </div>
                                        </div>
                                        <div class="col mb-2">
                                            {{ form_widget(form.rental_product.rental_price_monthly) }}
                                            {{ form_errors(form.rental_product.rental_price_monthly) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="d-inline-block">
                                                <span>{{ \'最大レンタル日数\'|trans }}</span>
                                            </div>
                                        </div>
                                        <div class="col mb-2">
                                            {{ form_widget(form.rental_product.rental_max_days) }}
                                            {{ form_errors(form.rental_product.rental_max_days) }}
                                        </div>
                                    </div>
                                    {% endif %}';
        
        $source = $event->getSource();
        $replaced = str_replace($search, $replace, $source);
        
        if ($source !== $replaced) {
            $event->setSource($replaced);
        }
    }
}
