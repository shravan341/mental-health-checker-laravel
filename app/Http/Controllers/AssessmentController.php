<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the assessment form.
     *
     * @param  string  $type
     * @return \Illuminate\View\View
     */
    public function index($type)
    {
        $validTypes = ['general', 'depression', 'anxiety', 'ptsd'];
        
        if (!in_array($type, $validTypes)) {
            return redirect()->route('assessment.types')
                ->with('error', 'Invalid assessment type selected.');
        }

        // Get questions based on assessment type
        $questions = $this->getQuestionsByType($type);
        
        return view('assessment.index', compact('questions', 'type'));
    }

    /**
     * Get questions for specific assessment type.
     *
     * @param  string  $type
     * @return array
     */
    private function getQuestionsByType($type)
    {
        $questions = [
            'general' => [
                [
                    'question' => 'Little interest or pleasure in doing things',
                    'order' => 1,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling down, depressed, or hopeless',
                    'order' => 2,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling nervous, anxious, or on edge',
                    'order' => 3,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Not being able to stop or control worrying',
                    'order' => 4,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Trouble falling or staying asleep, or sleeping too much',
                    'order' => 5,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling tired or having little energy',
                    'order' => 6,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Poor appetite or overeating',
                    'order' => 7,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling bad about yourself — or that you are a failure or have let yourself or your family down',
                    'order' => 8,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Trouble concentrating on things, such as reading or watching television',
                    'order' => 9,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Moving or speaking so slowly that others could have noticed, or being so restless you move around a lot more than usual',
                    'order' => 10,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Thoughts that you would be better off dead or of hurting yourself in some way',
                    'order' => 11,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Avoiding social interactions or activities you usually enjoy',
                    'order' => 12,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling isolated or lonely',
                    'order' => 13,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Having difficulties in your relationships with family or friends',
                    'order' => 14,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling unsupported or misunderstood by those around you',
                    'order' => 15,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Experiencing sudden feelings of panic or dread',
                    'order' => 16,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling overwhelmed by daily responsibilities',
                    'order' => 17,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Struggling to complete everyday tasks at work, school, or home',
                    'order' => 18,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Lack of motivation to start or finish tasks',
                    'order' => 19,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Experiencing frequent physical symptoms (like headaches, stomach aches) without a clear medical cause',
                    'order' => 20,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
            ],
            'depression' => [
                [
                    'question' => 'I have been able to laugh and see the funny side of things',
                    'order' => 1,
                    'options' => [
                        'As much as I always could',
                        'Not quite so much now',
                        'Definitely not so much now',
                        'Not at all'
                    ]
                ],
                [
                    'question' => 'I have looked forward with enjoyment to things',
                    'order' => 2,
                    'options' => [
                        'As much as I ever did',
                        'Rather less than I used to',
                        'Definitely less than I used to',
                        'Hardly at all'
                    ]
                ],
                [
                    'question' => 'I have blamed myself unnecessarily when things went wrong',
                    'order' => 3,
                    'options' => [
                        'Yes, most of the time',
                        'Yes, some of the time',
                        'Not very often',
                        'No, never'
                    ]
                ],
                [
                    'question' => 'I have been anxious or worried for no good reason',
                    'order' => 4,
                    'options' => [
                        'No, not at all',
                        'Hardly ever',
                        'Yes, sometimes',
                        'Yes, very often'
                    ]
                ],
                [
                    'question' => 'I have felt scared or panicky for no very good reason',
                    'order' => 5,
                    'options' => [
                        'Yes, quite a lot',
                        'Yes, sometimes',
                        'No, not much',
                        'No, not at all'
                    ]
                ],
                [
                    'question' => 'Things have been getting on top of me',
                    'order' => 6,
                    'options' => [
                        'Yes, most of the time I haven\'t been able to cope at all',
                        'Yes, sometimes I haven\'t been coping as well as usual',
                        'No, most of the time I have coped quite well',
                        'No, I have been coping as well as ever'
                    ]
                ],
                [
                    'question' => 'I have been so unhappy that I have had difficulty sleeping',
                    'order' => 7,
                    'options' => [
                        'Yes, most of the time',
                        'Yes, sometimes',
                        'Not very often',
                        'No, not at all'
                    ]
                ],
                [
                    'question' => 'I have felt sad or miserable',
                    'order' => 8,
                    'options' => [
                        'Yes, most of the time',
                        'Yes, quite often',
                        'Not very often',
                        'No, not at all'
                    ]
                ],
                [
                    'question' => 'I have been so unhappy that I have been crying',
                    'order' => 9,
                    'options' => [
                        'Yes, most of the time',
                        'Yes, quite often',
                        'Only occasionally',
                        'No, never'
                    ]
                ],
                [
                    'question' => 'The thought of harming myself has occurred to me',
                    'order' => 10,
                    'options' => [
                        'Yes, quite often',
                        'Sometimes',
                        'Hardly ever',
                        'Never'
                    ]
                ],
            ],
            'anxiety' => [
                [
                    'question' => 'Feeling nervous, anxious, or on edge',
                    'order' => 1,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Not being able to stop or control worrying',
                    'order' => 2,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Worrying too much about different things',
                    'order' => 3,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Trouble relaxing',
                    'order' => 4,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Being so restless that it is hard to sit still',
                    'order' => 5,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Becoming easily annoyed or irritable',
                    'order' => 6,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
                [
                    'question' => 'Feeling afraid, as if something awful might happen',
                    'order' => 7,
                    'options' => [
                        'Not at all',
                        'Several days',
                        'More than half the days',
                        'Nearly every day'
                    ]
                ],
            ],
            'ptsd' => [
                [
                    'question' => 'Having repeated, disturbing memories, thoughts, or images of a stressful experience from the past?',
                    'order' => 1,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Having repeated, disturbing dreams of a stressful experience from the past?',
                    'order' => 2,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Suddenly acting or feeling as if a stressful experience were happening again (as if you were reliving it)?',
                    'order' => 3,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Feeling very upset when something reminded you of a stressful experience from the past?',
                    'order' => 4,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Having physical reactions (e.g., heart pounding, trouble breathing, sweating) when something reminded you of a stressful experience?',
                    'order' => 5,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Avoiding thinking about or talking about a stressful experience from the past or avoiding having feelings related to it?',
                    'order' => 6,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Avoiding activities or situations because they reminded you of a stressful experience from the past?',
                    'order' => 7,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Trouble remembering important parts of a stressful experience from the past?',
                    'order' => 8,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Loss of interest in activities that you used to enjoy?',
                    'order' => 9,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Feeling distant or cut off from other people?',
                    'order' => 10,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Feeling emotionally numb or being unable to have loving feelings for those close to you?',
                    'order' => 11,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Feeling as if your future will somehow be cut short?',
                    'order' => 12,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Trouble falling or staying asleep?',
                    'order' => 13,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Feeling irritable or having angry outbursts?',
                    'order' => 14,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Having difficulty concentrating?',
                    'order' => 15,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Being "super-alert" or watchful or on guard?',
                    'order' => 16,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ],
                [
                    'question' => 'Feeling jumpy or easily startled?',
                    'order' => 17,
                    'options' => [
                        'Not at all',
                        'A little bit',
                        'Moderately',
                        'Quite a bit'
                    ]
                ]
            ],
        ];

        return collect($questions[$type])->map(function ($item, $key) {
            return (object) $item;
        });
    }

    /**
     * Store a newly completed assessment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $type)
    {
        $answers = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|min:0|max:3',
        ]);

        // Calculate total score
        $scores = $answers['answers'];
        $totalScore = array_sum($scores);
        
        // Get the number of questions answered
        $questionCount = count($scores);
        
        // Determine result category based on assessment type and score
        switch ($type) {
            case 'depression':
                // PHQ-9 scoring system (adjusted for our 0-3 scale)
                if ($totalScore <= $questionCount * 0.2) {
                    $result = 'Minimal';
                } elseif ($totalScore <= $questionCount * 0.4) {
                    $result = 'Mild';
                } elseif ($totalScore <= $questionCount * 0.6) {
                    $result = 'Moderate';
                } elseif ($totalScore <= $questionCount * 0.8) {
                    $result = 'Moderately Severe';
                } else {
                    $result = 'Severe';
                }
                break;

            case 'anxiety':
                // GAD-7 scoring system (adjusted for our 0-3 scale)
                if ($totalScore <= $questionCount * 0.25) {
                    $result = 'Minimal';
                } elseif ($totalScore <= $questionCount * 0.5) {
                    $result = 'Mild';
                } elseif ($totalScore <= $questionCount * 0.75) {
                    $result = 'Moderate';
                } else {
                    $result = 'Severe';
                }
                break;

            case 'ptsd':
                // PCL-5 scoring system
                $maxPossibleScore = $questionCount * 3; // 3 is max score per question
                $percentage = ($totalScore / $maxPossibleScore) * 100;

                // Using PCL-5 cutoff scores adjusted to our 0-3 scale
                if ($percentage <= 15) {
                    $result = 'Minimal';
                } elseif ($percentage <= 30) {
                    $result = 'Mild';
                } elseif ($percentage <= 45) {
                    $result = 'Moderate';
                } elseif ($percentage <= 60) {
                    $result = 'Moderately Severe';
                } else {
                    $result = 'Severe';
                }
                break;

            default: // general assessment
                // Calculate percentage score and categorize
                $maxPossibleScore = $questionCount * 3; // 3 is max score per question
                $percentage = ($totalScore / $maxPossibleScore) * 100;

                if ($percentage <= 20) {
                    $result = 'Minimal';
                } elseif ($percentage <= 40) {
                    $result = 'Mild';
                } elseif ($percentage <= 60) {
            $result = 'Moderate';
                } elseif ($percentage <= 80) {
                    $result = 'Moderately Severe';
        } else {
                    $result = 'Severe';
                }
                break;
        }

        $advice = $this->getAdvice($type, strtolower($result));

        // Create the assessment record
        $assessment = Auth::user()->assessments()->create([
            'type' => $type,
            'answers' => $answers['answers'],
            'result' => $result,
            'advice' => $advice,
            'score' => $totalScore,
        ]);

        return redirect()->route('assessment.result', $assessment->id);
    }

    /**
     * Get advice based on assessment type and result.
     *
     * @param  string  $type
     * @param  string  $severity
     * @return string
     */
    private function getAdvice($type, $severity)
    {
        $advice = [
            'general' => [
                'minimal' => 'Your responses suggest minimal mental health concerns. Continue maintaining your current healthy habits and self-care practices.',
                'mild' => 'You may be experiencing some mild mental health symptoms. Consider incorporating more self-care practices and stress management techniques.',
                'moderate' => 'Your responses indicate moderate mental health concerns. It would be beneficial to speak with a mental health professional for support and guidance.',
                'moderately_severe' => 'Your assessment suggests moderately severe mental health symptoms. We strongly recommend consulting with a mental health professional for evaluation and support.',
                'severe' => 'Your responses indicate severe mental health symptoms. Please seek immediate professional help. Consider reaching out to a mental health professional or crisis hotline for support.',
            ],
            'depression' => [
                'minimal' => 'Your responses suggest minimal depressive symptoms. Continue maintaining your current healthy habits and support systems.',
                'mild' => 'You may be experiencing some mild depressive symptoms. Consider incorporating more self-care practices and possibly talking to someone you trust.',
                'moderate' => 'Your responses indicate moderate depressive symptoms. It would be beneficial to speak with a mental health professional for support and guidance.',
                'moderately_severe' => 'Your assessment suggests moderately severe depressive symptoms. We strongly recommend consulting with a mental health professional for evaluation and support.',
                'severe' => 'Your responses indicate severe depressive symptoms. Please seek immediate professional help. Consider reaching out to a mental health professional or crisis hotline for support.',
            ],
            'anxiety' => [
                'minimal' => 'Your responses suggest minimal anxiety symptoms. Continue maintaining your current healthy habits and stress management practices.',
                'mild' => 'You may be experiencing some mild anxiety symptoms. Consider incorporating more relaxation techniques and stress management strategies into your daily routine.',
                'moderate' => 'Your responses indicate moderate anxiety symptoms. It would be beneficial to speak with a mental health professional for support and guidance in managing anxiety.',
                'severe' => 'Your responses indicate severe anxiety symptoms. We strongly recommend consulting with a mental health professional for evaluation and support. Consider reaching out to a mental health professional or crisis hotline for immediate assistance.',
            ],
            'ptsd' => [
                'minimal' => 'Your responses suggest minimal PTSD symptoms. Continue maintaining your current healthy habits and support systems.',
                'mild' => 'You may be experiencing some mild PTSD symptoms. Consider incorporating more self-care practices and possibly talking to someone you trust about your experiences.',
                'moderate' => 'Your responses indicate moderate PTSD symptoms. It would be beneficial to speak with a mental health professional who specializes in trauma for support and guidance.',
                'moderately_severe' => 'Your assessment suggests moderately severe PTSD symptoms. We strongly recommend consulting with a mental health professional who specializes in trauma for evaluation and support.',
                'severe' => 'Your responses indicate severe PTSD symptoms. Please seek immediate professional help from a mental health professional who specializes in trauma. Consider reaching out to a crisis hotline for immediate support.',
            ],
        ];

        return $advice[$type][$severity];
    }

    /**
     * Display the assessment result.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\View\View
     */
    public function result(Assessment $assessment)
    {
        // Make sure the user only sees their own assessments
        if ($assessment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('assessment.result', compact('assessment'));
    }

    /**
     * Display the user's past assessments.
     *
     * @return \Illuminate\View\View
     */
    public function history()
    {
        $assessments = Auth::user()->assessments()->orderBy('created_at', 'desc')->get();
        return view('assessment.history', compact('assessments'));
    }

    /**
     * Show the assessment types page.
     *
     * @return \Illuminate\View\View
     */
    public function showTypes()
    {
        $assessmentTypes = [
            'general' => [
                'title' => 'General Mental Health Test',
                'description' => 'A comprehensive evaluation of your overall mental well-being, covering various aspects of mental health.',
                'duration' => '10-15 minutes',
                'icon' => 'bi-activity',
                'color' => 'primary'
            ],
            'depression' => [
                'title' => 'Depression Test',
                'description' => 'Assess symptoms of depression and understand your emotional state better.',
                'duration' => '8-10 minutes',
                'icon' => 'bi-cloud-rain',
                'color' => 'info'
            ],
            'anxiety' => [
                'title' => 'Anxiety Test',
                'description' => 'Evaluate your anxiety levels and identify potential anxiety-related concerns.',
                'duration' => '8-10 minutes',
                'icon' => 'bi-wind',
                'color' => 'warning'
            ],
            'ptsd' => [
                'title' => 'Post-Traumatic Stress Disorder (PTSD) Test',
                'description' => 'Screen for symptoms of PTSD and assess your response to traumatic experiences.',
                'duration' => '12-15 minutes',
                'icon' => 'bi-shield-plus',
                'color' => 'danger'
            ]
        ];

        return view('assessment.types', compact('assessmentTypes'));
    }
}
