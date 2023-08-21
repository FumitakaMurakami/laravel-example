<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TimeLineController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        Log::info('START - TimelineController::index(Request $request)');

        $timeline = Timeline::first();
        $timelineArray = json_decode($timeline->timeline, true);
        Log::info($timeline->timeline);
        Log::info(json_decode($timeline->timeline, true));

        Log::info('END - TimelineController::index');

        return view('welcome')
            ->with(
                [
                    'timeline' => $timelineArray
                ]
            );
    }

    public function registerTimeline(Request $request)
    {
        Log::info(
            'START - TimelineController::registerTimeline(Request $request)'
        );

        $userId = $request->all()['user_id'];
        $subjects = $request->all()['subjects'];
        $timeline = new Timeline;

        $jsonSubjects = self::parsTimeline($subjects);


        //$timeline->insert(['user_id' => 'Flight 10'])

        $newTimeline = $timeline->first();
        $timeLineArray = json_decode($newTimeline->timeline, true);


        Log::info('END - StaffAuthenticationController::registerTimeline');

        return view('welcome')
            ->with(
                [
                    'timeline' => $timeLineArray
                ]
            );
    }

    private function parsTimeline(array $subjects)
    {
        Log::info(
            'START - TimelineController::parsTimeline($subjects))'
        );

        // $schedule = [
        //     "月曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
        //     "火曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
        //     "水曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
        //     "木曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
        //     "金曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
        // ];

        $schedule = [
            "月曜日" => [],
            "火曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
            "水曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
            "木曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
            "金曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
        ];

        $dayCounter = 1;
        $subjectCounter = 1;

        foreach ($subjects as $subject) {
            switch (true) {
                case $dayCounter === 1:
                    switch ($subjectCounter) {
                        case 1:
                            $schedule[0]["時間1"] = $subject;
                            Log::info($schedule);
                            $subjectCounter++;
                    }
                    if ($subjectCounter === 5) {
                        $dayCounter++;
                    }
                    break;
                case $dayCounter === 2:
                    echo "iは1に等しい";
                    break;
                case $dayCounter === 3:
                    echo "iは2に等しい";
                    break;
                case $dayCounter === 4:
                    echo "iは1に等しい";
                    break;
                case $dayCounter === 5:
                    echo "iは2に等しい";
                    break;
            }
            //Log::info($subject);
        }

        Log::info(json_encode($schedule, JSON_UNESCAPED_UNICODE));

        Log::info('END - StaffAuthenticationController::registerTimeline');

        //return $parsSubject;
    }
}
