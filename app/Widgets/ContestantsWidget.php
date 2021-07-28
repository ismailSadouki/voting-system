<?php

namespace App\Widgets;

use App\Models\Contestant;
use Arrilot\Widgets\AbstractWidget;

class ContestantsWidget extends AbstractWidget
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
        $contestants = Contestant::where('unique_url', $this->config['unique_url'])->select('id', 'name', 'number_of_votes')->orderByDesc('number_of_votes')->get();
        return view('widgets.contestants_widget', [
            'config' => $this->config,
            'contestants' => $contestants,
        ]);
    }

    public function container()
    {

        return [
            'element'       => 'div',
            'attributes'    => 'onclick="modelToggleVote({{$contestant->id}}, \'{{$contestant->name }}\');" class="col-12 text-center leaderboard-card"',
        ];
    }
}
