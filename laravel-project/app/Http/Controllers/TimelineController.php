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

        $timeline = Timeline::latest('id')->first();
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

        $newTimeline = $timeline->latest('id')->first();
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

        $schedule = [
            "月曜日" => ["時間1" => "", "時間2" => "", "時間3" => "", "時間4" => "", "時間5" => "", "時間6" => "", "時間7" => ""],
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
                            $schedule["月曜日"]["時間1"] = $subject;
                            break;
                        case 2:
                            $schedule["月曜日"]["時間2"] = $subject;
                            break;
                        case 3:
                            $schedule["月曜日"]["時間3"] = $subject;
                            break;
                        case 4:
                            $schedule["月曜日"]["時間4"] = $subject;
                            break;
                        case 5:
                            $schedule["月曜日"]["時間5"] = $subject;
                            break;
                        case 6:
                            $schedule["月曜日"]["時間6"] = $subject;
                            break;
                        case 7:
                            $schedule["月曜日"]["時間7"] = $subject;
                            break;
                    }
                    $subjectCounter++;
                    if ($subjectCounter === 8) {
                        $subjectCounter = 1;
                        $dayCounter++;
                    }
                    break;
                case $dayCounter === 2:
                    switch ($subjectCounter) {
                        case 1:
                            $schedule["火曜日"]["時間1"] = $subject;
                            break;
                        case 2:
                            $schedule["火曜日"]["時間2"] = $subject;
                            break;
                        case 3:
                            $schedule["火曜日"]["時間3"] = $subject;
                            break;
                        case 4:
                            $schedule["火曜日"]["時間4"] = $subject;
                            break;
                        case 5:
                            $schedule["火曜日"]["時間5"] = $subject;
                            break;
                        case 6:
                            $schedule["火曜日"]["時間6"] = $subject;
                            break;
                        case 7:
                            $schedule["火曜日"]["時間7"] = $subject;
                            break;
                    }
                    $subjectCounter++;
                    if ($subjectCounter === 8) {
                        $subjectCounter = 1;
                        $dayCounter++;
                    }
                    break;
                case $dayCounter === 3:
                    switch ($subjectCounter) {
                        case 1:
                            $schedule["水曜日"]["時間1"] = $subject;
                            break;
                        case 2:
                            $schedule["水曜日"]["時間2"] = $subject;
                            break;
                        case 3:
                            $schedule["水曜日"]["時間3"] = $subject;
                            break;
                        case 4:
                            $schedule["水曜日"]["時間4"] = $subject;
                            break;
                        case 5:
                            $schedule["水曜日"]["時間5"] = $subject;
                            break;
                        case 6:
                            $schedule["水曜日"]["時間6"] = $subject;
                            break;
                        case 7:
                            $schedule["水曜日"]["時間7"] = $subject;
                            break;
                    }
                    $subjectCounter++;
                    if ($subjectCounter === 8) {
                        $subjectCounter = 1;
                        $dayCounter++;
                    }
                    break;
                case $dayCounter === 4:
                    switch ($subjectCounter) {
                        case 1:
                            $schedule["木曜日"]["時間1"] = $subject;
                            break;
                        case 2:
                            $schedule["木曜日"]["時間2"] = $subject;
                            break;
                        case 3:
                            $schedule["木曜日"]["時間3"] = $subject;
                            break;
                        case 4:
                            $schedule["木曜日"]["時間4"] = $subject;
                            break;
                        case 5:
                            $schedule["木曜日"]["時間5"] = $subject;
                            break;
                        case 6:
                            $schedule["木曜日"]["時間6"] = $subject;
                            break;
                        case 7:
                            $schedule["木曜日"]["時間7"] = $subject;
                            break;
                    }
                    $subjectCounter++;
                    if ($subjectCounter === 8) {
                        $subjectCounter = 1;
                        $dayCounter++;
                    }
                    break;
                case $dayCounter === 5:
                    switch ($subjectCounter) {
                        case 1:
                            $schedule["金曜日"]["時間1"] = $subject;
                            break;
                        case 2:
                            $schedule["金曜日"]["時間2"] = $subject;
                            break;
                        case 3:
                            $schedule["金曜日"]["時間3"] = $subject;
                            break;
                        case 4:
                            $schedule["金曜日"]["時間4"] = $subject;
                            break;
                        case 5:
                            $schedule["金曜日"]["時間5"] = $subject;
                            break;
                        case 6:
                            $schedule["金曜日"]["時間6"] = $subject;
                            break;
                        case 7:
                            $schedule["金曜日"]["時間7"] = $subject;
                            break;
                    }
                    $subjectCounter++;
                    if ($subjectCounter === 8) {
                        $subjectCounter = 1;
                        $dayCounter++;
                    }
                    break;
            }
        }

        Log::info('END - StaffAuthenticationController::registerTimeline');

        return json_encode($schedule, JSON_UNESCAPED_UNICODE);
    }
}
