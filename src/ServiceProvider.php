<?php

namespace Northeastern\Blade;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Northeastern\Blade\Components\Accordion\Base as AccordionBase;
use Northeastern\Blade\Components\Accordion\Item as AccordionItem;
use Northeastern\Blade\Components\Accordion\WithLeftIcon as AccordionWithLeftIcon;
use Northeastern\Blade\Components\Alert\Contained as AlertContained;
use Northeastern\Blade\Components\Alert\FullWidth as AlertFullWidth;
use Northeastern\Blade\Components\Banners\BottomTitle as BannersBottomTitle;
use Northeastern\Blade\Components\Banners\WithFullWidthOverlay as BannersWithFullWidthOverlay;
use Northeastern\Blade\Components\Banners\WithOffsetCard as BannersWithOffsetCard;
use Northeastern\Blade\Components\Button\Outline as ButtonOutline;
use Northeastern\Blade\Components\Button\Solid as ButtonSolid;
use Northeastern\Blade\Components\Cards\Event as CardEvent;
use Northeastern\Blade\Components\Cards\LinkWithMedia as CardLinkWithMedia;
use Northeastern\Blade\Components\Cards\LinkWithMediaAndActions as CardLinkWithMediaAndActions;
use Northeastern\Blade\Components\Cards\SimpleLink as CardSimpleLink;
use Northeastern\Blade\Components\Cards\SimpleWithActions as CardSimpleWithActions;
use Northeastern\Blade\Components\Carousel\Base as CarouselBase;
use Northeastern\Blade\Components\Carousel\Base\Slide as CarouselBaseSlide;
use Northeastern\Blade\Components\Carousel\Split as CarouselSplit;
use Northeastern\Blade\Components\Carousel\Split\Slide as CarouselSplitSlide;
use Northeastern\Blade\Components\Footers\Local as FooterLocal;
use Northeastern\Blade\Components\Footers\Local2 as FooterLocal2;
use Northeastern\Blade\Components\Footers\PreFooter\Base as PreFooterBase;
use Northeastern\Blade\Components\Footers\PreFooter\Column as PreFooterColumn;
use Northeastern\Blade\Components\Heroes\CenteredContent as HeroesCenteredContent;
use Northeastern\Blade\Components\Heroes\SplitLayoutContentMedia as HeroesSplitLayoutContentMedia;
use Northeastern\Blade\Components\InteriorNavigation\Base as InteriorNavigationBase;
use Northeastern\Blade\Components\Loaders\Dark as LoadersDark;
use Northeastern\Blade\Components\Loaders\Light as LoadersLight;
use Northeastern\Blade\Components\LocalHeader;
use Northeastern\Blade\Components\Modals\Base as ModalsBase;
use Northeastern\Blade\Components\Paginators\Base as PaginatorBase;
use Northeastern\Blade\Components\Scripts;
use Northeastern\Blade\Components\Selects\Select;
use Northeastern\Blade\Components\Tabs\Bordered as TabsBordered;
use Northeastern\Blade\Components\Tabs\Detached as TabsDetached;
use Northeastern\Blade\Components\Tabs\Underlined as TabsUnderlined;
use Northeastern\Blade\Components\Tags\Outline as TagsOutline;
use Northeastern\Blade\Components\Tags\Solid as TagsSolid;

class ServiceProvider extends BaseServiceProvider
{
    const COMPONENTS = [
        LocalHeader::class => 'kernl-local-header',
        AccordionBase::class => 'kernl-accordion.base',
        AccordionItem::class => 'kernl-accordion.item',
        AccordionWithLeftIcon::class => 'kernl-accordion.with-left-icon',
        AlertContained::class => 'kernl-alert.contained',
        AlertFullWidth::class => 'kernl-alert.full-width',
        BannersWithFullWidthOverlay::class => 'kernl-banners.with-full-width-overlay',
        BannersWithOffsetCard::class => 'kernl-banners.with-offset-card',
        BannersBottomTitle::class => 'kernl-banners.bottom-title',
        ButtonOutline::class => 'kernl-button.outline',
        ButtonSolid::class => 'kernl-button.solid',
        CarouselBase::class => 'kernl-carousel.base',
        CarouselBaseSlide::class => 'kernl-carousel.base.slide',
        CarouselSplit::class => 'kernl-carousel.split',
        CarouselSplitSlide::class => 'kernl-carousel.split.slide',
        LoadersLight::class => 'kernl-loaders.light',
        LoadersDark::class => 'kernl-loaders.dark',
        TagsSolid::class => 'kernl-tags.solid',
        TagsOutline::class => 'kernl-tags.outline',
        ModalsBase::class => 'kernl-modals.base',
        FooterLocal::class => 'kernl-footers.local',
        FooterLocal2::class => 'kernl-footers.local-2',
        PreFooterBase::class => 'kernl-footers.pre-footer.base',
        PreFooterColumn::class => 'kernl-footers.pre-footer.column',
        Scripts::class => 'kernl-scripts',
        TabsUnderlined::class => 'kernl-tabs.underlined',
        TabsUnderlined\Item::class => 'kernl-tabs.underlined.item',
        TabsBordered::class => 'kernl-tabs.bordered',
        TabsBordered\Item::class => 'kernl-tabs.bordered.item',
        TabsDetached::class => 'kernl-tabs.detached',
        TabsDetached\Item::class => 'kernl-tabs.detached.item',
        HeroesSplitLayoutContentMedia::class => 'kernl-heroes.split-layout-content-media',
        HeroesCenteredContent::class => 'kernl-heroes.centered-content',
        InteriorNavigationBase::class => 'kernl-interior-navigation.base',
        CardSimpleLink::class => 'kernl-cards.simple-link',
        CardSimpleWithActions::class => 'kernl-cards.simple-with-actions',
        CardLinkWithMedia::class => 'kernl-cards.link-with-media',
        CardLinkWithMediaAndActions::class => 'kernl-cards.link-with-media-and-actions',
        CardEvent::class => 'kernl-cards.event',
        Select::class => 'kernl-selects.select',
        PaginatorBase::class => 'kernl-paginators.base',
    ];
}
