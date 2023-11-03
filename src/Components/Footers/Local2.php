<?php
namespace Northeastern\Blade\Components\Footers;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Local2 extends Component
{
    public $links;

    public $logoUrl;

    public $socialLinks;

    public function __construct(
        $links = [],
        $logoUrl = '#',
        $socialLinks = [],
    ) {
        $this->links = $links;

        $this->logoUrl = $logoUrl;

        $this->socialLinks = $socialLinks
    }

    public function render()
    {
        return View::make('kernl-ui::footers.local-2');
    }
}
