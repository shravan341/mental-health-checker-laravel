@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.css" rel="stylesheet">
<style>
    .dashboard-card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 500;
    }
    .status-badge i {
        margin-right: 0.25rem;
    }
    .streak-card {
        background: linear-gradient(135deg, #6b73ff 0%, #4accf0 100%);
        color: white;
    }
    .quick-note {
        resize: none;
        border-radius: 10px;
    }
    .mood-calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
    }
    .mood-day {
        aspect-ratio: 1;
        border-radius: 5px;
        font-size: 0.8rem;
    }
    .loading-skeleton {
        animation: skeleton-loading 1s linear infinite alternate;
    }
    @keyframes skeleton-loading {
        0% { background-color: rgba(0, 0, 0, 0.1); }
        100% { background-color: rgba(0, 0, 0, 0.2); }
    }
    .quick-link-item {
        padding: 1.5rem !important;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }
    
    .quick-link-icon {
        color: var(--primary-color);
        transition: all 0.3s ease;
    }
    
    .quick-link-item:hover {
        background-color: rgba(74, 108, 247, 0.05);
        border-left: 3px solid var(--primary-color);
    }
    
    .quick-link-item:hover .quick-link-icon {
        transform: scale(1.2);
        color: var(--primary-color);
    }
    
    .list-group-flush > .list-group-item {
        border-width: 0 0 1px;
    }
    
    .list-group-flush > .list-group-item:last-child {
        border-bottom-width: 0;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Dashboard') }}</span>
                    <a href="{{ route('assessment.types') }}" class="btn btn-primary btn-sm">Start New Assessment</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Welcome, {{ Auth::user()->name }}!</h5>
                    <p>Track your mental health journey with regular assessments and review your progress over time.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- How Does It Work Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-primary mb-4">How does it work?</h2>
            <p class="lead mb-4">After your mental health test, you will see information, resources, and tools to help you understand and improve your mental health.</p>
            
            <!-- Accordion for Information -->
            <div class="accordion" id="howItWorksAccordion">
                <!-- Online Testing Help -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            HOW CAN ONLINE MENTAL HEALTH TESTING HELP ME?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#howItWorksAccordion">
                        <div class="accordion-body">
                            <ul class="list-unstyled">
                                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Get instant feedback on your mental well-being</li>
                                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Track changes in your mental health over time</li>
                                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Access personalized resources and support options</li>
                                <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Identify potential areas of concern early</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Test Results Meaning -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            WHAT DO MY MENTAL HEALTH TEST RESULTS MEAN?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#howItWorksAccordion">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card border-success mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title text-success">Good</h5>
                                            <p class="card-text">Your mental health appears to be in a good state. Continue your positive practices.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-warning mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title text-warning">Moderate</h5>
                                            <p class="card-text">Some areas may need attention. Consider reviewing provided resources.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-danger mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title text-danger">Needs Attention</h5>
                                            <p class="card-text">Consider reaching out to mental health professionals for support.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About Our Tests -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            ABOUT OUR MENTAL HEALTH TESTS
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#howItWorksAccordion">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>What We Assess</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi bi-dot"></i> Emotional well-being</li>
                                        <li class="mb-2"><i class="bi bi-dot"></i> Stress levels</li>
                                        <li class="mb-2"><i class="bi bi-dot"></i> Anxiety indicators</li>
                                        <li class="mb-2"><i class="bi bi-dot"></i> Depression screening</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Test Features</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi bi-dot"></i> Evidence-based questions</li>
                                        <li class="mb-2"><i class="bi bi-dot"></i> Confidential results</li>
                                        <li class="mb-2"><i class="bi bi-dot"></i> Instant feedback</li>
                                        <li class="mb-2"><i class="bi bi-dot"></i> Progress tracking</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <x-recent-assessments :assessments="$recentAssessments" />
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-bold text-dark">{{ __('Quick Links') }}</h5>
                </div>
                <div class="card-body p-0 d-flex flex-column">
                    <div class="list-group list-group-flush flex-grow-1 d-flex flex-column">
                        <a href="{{ route('assessment.types') }}" class="list-group-item list-group-item-action flex-grow-1 d-flex align-items-center quick-link-item">
                            <div class="d-flex align-items-center w-100">
                                <i class="bi bi-clipboard-check fs-5 quick-link-icon"></i>
                                <span class="ms-3">Assessments</span>
                            </div>
                        </a>
                        <a href="{{ route('assessment.history') }}" class="list-group-item list-group-item-action flex-grow-1 d-flex align-items-center quick-link-item">
                            <div class="d-flex align-items-center w-100">
                                <i class="bi bi-clock-history fs-5 quick-link-icon"></i>
                                <span class="ms-3">Past Assessments</span>
                            </div>
                        </a>
                        <a href="{{ route('support.index') }}" class="list-group-item list-group-item-action flex-grow-1 d-flex align-items-center quick-link-item">
                            <div class="d-flex align-items-center w-100">
                                <i class="bi bi-heart fs-5 quick-link-icon"></i>
                                <span class="ms-3">Health Support Resources</span>
                            </div>
                        </a>
                        <a href="{{ route('about.index') }}" class="list-group-item list-group-item-action flex-grow-1 d-flex align-items-center quick-link-item">
                            <div class="d-flex align-items-center w-100">
                                <i class="bi bi-info-circle fs-5 quick-link-icon"></i>
                                <span class="ms-3">About Mental Health Status</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.0/dist/apexcharts.min.js"></script>
<script>
    // Initialize dark mode
    const darkModeToggle = document.getElementById('darkModeToggle');
    darkModeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        // Save preference to localStorage
        localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
    });

    // Assessment Chart
    const options = {
        chart: {
            type: 'line',
            height: 300,
            toolbar: {
                show: false
            }
        },
        series: [{
            name: 'Mental Health Score',
            data: [65, 74, 68, 80, 72, 75, 70]
        }],
        xaxis: {
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
        },
        stroke: {
            curve: 'smooth'
        },
        colors: ['#4accf0'],
        grid: {
            borderColor: '#f1f1f1'
        }
    };

    const chart = new ApexCharts(document.querySelector("#assessmentChart"), options);
    chart.render();

    // Populate Mood Calendar
    const moodCalendar = document.querySelector('.mood-calendar');
    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    
    // Add day headers
    days.forEach(day => {
        const dayHeader = document.createElement('div');
        dayHeader.className = 'mood-day text-center text-muted';
        dayHeader.textContent = day;
        moodCalendar.appendChild(dayHeader);
    });

    // Add mood squares for the month
    for (let i = 1; i <= 31; i++) {
        const moodDay = document.createElement('div');
        moodDay.className = 'mood-day';
        moodDay.style.backgroundColor = getRandomMoodColor();
        moodCalendar.appendChild(moodDay);
    }

    function getRandomMoodColor() {
        const colors = [
            'rgba(40, 167, 69, 0.2)',  // good
            'rgba(255, 193, 7, 0.2)',  // moderate
            'rgba(220, 53, 69, 0.2)'   // needs attention
        ];
        return colors[Math.floor(Math.random() * colors.length)];
    }

    // Rotate motivational quotes
    const quotes = [
        "Small steps every day add up to big changes over time.",
        "Your mental health matters. Take care of yourself.",
        "Progress isn't always linear, and that's okay.",
        "Every check-in is a step toward better understanding yourself.",
        "You're doing better than you think."
    ];

    let currentQuote = 0;
    const quoteElement = document.getElementById('motivationalQuote');
    
    setInterval(() => {
        currentQuote = (currentQuote + 1) % quotes.length;
        quoteElement.textContent = quotes[currentQuote];
    }, 10000);
</script>
@endsection
