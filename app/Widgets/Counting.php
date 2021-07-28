<?php

namespace App\Widgets;

use App\Models\Competition;
use App\Models\Contestant;
use Arrilot\Widgets\AbstractWidget;
use Rainwater\Active\Active;

class Counting extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'unique_url' => '',
    ];
    public $reloadTimeout = 3;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //
        $competition = Competition::where('unique_url', $this->config['unique_url'])->first();
        $number_of_votes = Contestant::where('unique_url', $this->config['unique_url'])->sum('number_of_votes');
        $numberOfGuests = Active::guestsWithinSeconds(5)->count();

        if ($numberOfGuests > $competition['largest_presence']) {
            $competition['largest_presence'] = $numberOfGuests ;
            $competition->update();
        }
        return view('widgets.counting', [
            'config' => $this->config,
            'number_of_votes' => $number_of_votes,
            'numberOfGuests' => $numberOfGuests,
            'largest_presence' => $competition['largest_presence']
        ]);
        
    }

    public function container()
    {

        return [
            'element'       => 'div',
            'attributes'    => ' class="solved counting"',
        ];
    }
}
