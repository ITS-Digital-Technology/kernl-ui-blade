<?php
namespace Northeastern\Blade\Components\Banners;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use InvalidArgumentException;

class WithFullWidthOverlay extends Component
{
    public $solidBackgroundColor;
    public $backgroundUrl;
    public $includeImage;
    public $height;

    protected $colors = [
        'dark' => ['text-white', 'bg-black'],
        'light' => ['text-gray-900', 'bg-white'],
        'medium-gray' => ['text-white', 'bg-gray-600'],
        'light-gray' => ['text-gray-900', 'bg-gray-300'],
        'red' => ['text-white', 'bg-red-600'],
        'blue' => ['text-white', 'bg-blue-700'],
        'green' => ['text-white', 'bg-green-600'],
        'yellow' => ['text-black', 'bg-yellow-300'],
    ];

    public function __construct($backgroundUrl = null, $height = null, $solidBackgroundColor = 'dark')
    {
        $this->backgroundUrl = $backgroundUrl;
        $this->height = $height;

        if (!array_key_exists($this->solidBackgroundColor, $this->colors)) {
            throw new InvalidArgumentException('`' . $this->solidBackgroundColor . '` is not a supported color option.');
        }

        $this->solidBackgroundColor = $solidBackgroundColor;
    }

    public function height()
    {
        return (
            $this->height == 'half' 
                ? 'py-8 md:py-10 lg:py-16' 
                : 'py-16 md:py-20 lg:py-32'
        );
    }

    public function compiledClasses()
    {
        return $this->attributes->merge([
            'class' => collect()
                ->merge($this->height())
                ->merge($this->colors[$this->solidBackgroundColor])
                ->join(' '),
        ]);
    }

    public function render()
    {
        return View::make('kernl-ui::banners.with-full-width-overlay');
    }
}
