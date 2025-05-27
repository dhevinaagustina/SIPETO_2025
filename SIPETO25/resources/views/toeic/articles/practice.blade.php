@extends('layouts.app')

@section('content')
<div class="container py-5 animate__animated animate__fadeIn">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <article class="practice-resources shadow-lg rounded-3 overflow-hidden">
        <!-- Hero Section -->
        <header class="resources-header text-center bg-primary-gradient py-5 text-white">
          <div class="container">
            <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">TOEIC Practice Resources</h1>
            <p class="lead mb-4 animate__animated animate__fadeIn animate__delay-1s">Curated Materials to Boost Your Preparation</p>
            <div class="animate__animated animate__zoomIn animate__delay-2s">
              <span class="badge bg-white text-primary fs-6 me-2"><i class="bi bi-collection-play-fill me-1"></i>Practice Tests</span>
              <span class="badge bg-white text-primary fs-6 me-2"><i class="bi bi-journal-bookmark-fill me-1"></i>Study Guides</span>
              <span class="badge bg-white text-primary fs-6"><i class="bi bi-headset me-1"></i>Audio Exercises</span>
            </div>
          </div>
        </header>

        <!-- Resource Navigation -->
        <nav class="resources-nav bg-light py-3 sticky-top">
          <div class="container">
            <ul class="nav nav-pills justify-content-center">
              <li class="nav-item mx-1">
                <a class="nav-link active" href="#official-materials">
                  <i class="bi bi-award-fill me-1"></i>Official
                </a>
              </li>
              <li class="nav-item mx-1">
                <a class="nav-link" href="#books">
                  <i class="bi bi-book-half me-1"></i>Books
                </a>
              </li>
              <li class="nav-item mx-1">
                <a class="nav-link" href="#online">
                  <i class="bi bi-globe me-1"></i>Online
                </a>
              </li>
              <li class="nav-item mx-1">
                <a class="nav-link" href="#mobile-apps">
                  <i class="bi bi-phone me-1"></i>Apps
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <!-- Main Content -->
        <div class="resources-body p-4 p-md-5 bg-white">
          <!-- Introduction -->
          <section class="mb-5 text-center">
            <div class="practice-stats-card p-4 bg-light rounded-3 border-start border-primary border-4 animate__animated animate__fadeIn">
              <p class="lead mb-0">Students who complete <span class="fw-bold text-primary">3+ full practice tests</span> score <span class="fw-bold text-primary">150 points higher</span> on average than those who don't.</p>
            </div>
          </section>

          <!-- Official Materials -->
          <section id="official-materials" class="mb-5 pt-4">
            <h2 class="section-title mb-4 d-flex align-items-center">
              <span class="section-icon me-3"><i class="bi bi-award-fill"></i></span>
              <span>Official Preparation Materials</span>
            </h2>

            <div class="row g-4">
              <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="card h-100 border-primary shadow-sm resource-card">
                  <div class="card-img-top bg-primary text-white text-center py-4">
                    <i class="bi bi-file-earmark-text-fill fs-1"></i>
                  </div>
                  <div class="card-body">
                    <h3 class="h5">Official TOEIC Tests</h3>
                    <p class="text-muted small">Published by ETS</p>
                    <ul class="resource-features">
                      <li><i class="bi bi-check-circle-fill text-success me-2"></i>2 full-length tests</li>
                      <li><i class="bi bi-check-circle-fill text-success me-2"></i>Detailed answer explanations</li>
                      <li><i class="bi bi-check-circle-fill text-success me-2"></i>Authentic question types</li>
                    </ul>
                  </div>
                  <div class="card-footer bg-transparent border-0">
                    <a href="#" class="btn btn-primary w-100">
                      <i class="bi bi-download me-1"></i> Get Sample
                    </a>
                  </div>
                </div>
              </div>
              <!-- Additional official resources -->
            </div>
          </section>

          <!-- Recommended Books -->
          <section id="books" class="mb-5 pt-4">
            <h2 class="section-title mb-4 d-flex align-items-center">
              <span class="section-icon me-3"><i class="bi bi-book-half"></i></span>
              <span>Recommended Preparation Books</span>
            </h2>

            <div class="book-comparison table-responsive">
              <table class="table table-hover align-middle">
                <thead class="table-primary">
                  <tr>
                    <th>Book Title</th>
                    <th>Practice Tests</th>
                    <th>Skill Builders</th>
                    <th>Audio</th>
                    <th>Price</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="animate__animated animate__fadeIn">
                    <td>
                      <strong>Barron's TOEIC Superpack</strong>
                      <small class="d-block text-muted">4th Edition</small>
                    </td>
                    <td><i class="bi bi-check-circle-fill text-success"></i> 4 tests</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i> Yes</td>
                    <td><i class="bi bi-check-circle-fill text-success"></i> MP3 CD</td>
                    <td>$35</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-cart-plus"></i>
                      </a>
                    </td>
                  </tr>
                  <!-- Additional books -->
                </tbody>
              </table>
            </div>
          </section>

          <!-- Online Resources -->
          <section id="online" class="mb-5 pt-4">
            <h2 class="section-title mb-4 d-flex align-items-center">
              <span class="section-icon me-3"><i class="bi bi-globe"></i></span>
              <span>Online Practice Platforms</span>
            </h2>

            <div class="platform-tabs">
              <ul class="nav nav-tabs" id="platformTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="free-tab" data-bs-toggle="tab" data-bs-target="#free-content" type="button" role="tab">
                    <i class="bi bi-gift-fill me-1"></i> Free Resources
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premium-content" type="button" role="tab">
                    <i class="bi bi-star-fill me-1"></i> Premium Services
                  </button>
                </li>
              </ul>
              <div class="tab-content p-4 border border-top-0 rounded-bottom" id="platformTabContent">
                <div class="tab-pane fade show active" id="free-content" role="tabpanel">
                  <div class="row g-4">
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <i class="bi bi-patch-check-fill text-primary fs-3"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h4>Exam English</h4>
                          <p>Free practice tests for all TOEIC sections with instant scoring.</p>
                          <a href="#" class="btn btn-sm btn-outline-primary">Visit Site</a>
                        </div>
                      </div>
                    </div>
                    <!-- Additional free resources -->
                  </div>
                </div>
                <div class="tab-pane fade" id="premium-content" role="tabpanel">
                  <div class="row g-4">
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <i class="bi bi-gem text-warning fs-3"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h4>TOEIC Official Prep</h4>
                          <p>Full online course with personalized study plan and progress tracking.</p>
                          <span class="badge bg-warning text-dark">$29/month</span>
                          <a href="#" class="btn btn-sm btn-outline-warning ms-2">Try Free</a>
                        </div>
                      </div>
                    </div>
                    <!-- Additional premium resources -->
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Mobile Apps -->
          <section id="mobile-apps" class="mb-5 pt-4">
            <h2 class="section-title mb-4 d-flex align-items-center">
              <span class="section-icon me-3"><i class="bi bi-phone"></i></span>
              <span>Mobile Practice Apps</span>
            </h2>

            <div class="app-carousel owl-carousel owl-theme">
              <div class="app-card item p-3 border rounded-3">
                <div class="d-flex align-items-center mb-3">
                  <img src="https://via.placeholder.com/50" class="rounded-3 me-3" alt="App Icon">
                  <div>
                    <h5 class="mb-0">TOEIC Master</h5>
                    <div class="star
                                        <div class="star-rating text-warning small">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                      <span class="text-muted ms-1">(4.7)</span>
                    </div>
                  </div>
                </div>
                <p class="small">Daily practice questions with detailed explanations</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-light text-dark"><i class="bi bi-phone me-1"></i> iOS/Android</span>
                  <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                </div>
              </div>
              <!-- Additional app cards -->
            </div>
          </section>

          <!-- Study Plan Generator -->
          <section class="study-plan-generator bg-light p-4 rounded-3 mb-5">
            <h3 class="d-flex align-items-center mb-4">
              <i class="bi bi-calendar-plus text-primary me-2"></i>
              Personalized Study Plan Generator
            </h3>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Target Score</label>
                <select class="form-select">
                  <option>600-700 (Intermediate)</option>
                  <option>700-800 (Upper Intermediate)</option>
                  <option>800+ (Advanced)</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Weeks Until Test</label>
                <select class="form-select">
                  <option>2 weeks (Intensive)</option>
                  <option>4 weeks (Standard)</option>
                  <option>8+ weeks (Comprehensive)</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Weakest Section</label>
                <select class="form-select">
                  <option>Listening</option>
                  <option>Reading</option>
                  <option>Both</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Daily Study Time</label>
                <select class="form-select">
                  <option>30 minutes</option>
                  <option>1 hour</option>
                  <option>2+ hours</option>
                </select>
              </div>
              <div class="col-12 mt-3">
                <button class="btn btn-primary generate-plan-btn">
                  <i class="bi bi-magic me-1"></i> Generate My Plan
                </button>
              </div>
            </div>
            <div class="plan-result mt-4 p-3 bg-white rounded-3 shadow-sm" style="display: none;">
              <h4 class="mb-3">Your Custom Study Plan</h4>
              <div class="plan-schedule"></div>
              <button class="btn btn-sm btn-outline-success mt-3">
                <i class="bi bi-printer me-1"></i> Print Plan
              </button>
            </div>
          </section>

          <!-- Resource Comparison -->
          <section class="resource-comparison mb-5">
            <h3 class="d-flex align-items-center mb-4">
              <i class="bi bi-clipboard2-data text-primary me-2"></i>
              Resource Effectiveness Comparison
            </h3>
            <div class="chart-container" style="height: 300px;">
              <canvas id="effectivenessChart"></canvas>
            </div>
            <div class="legend mt-3 text-center"></div>
          </section>

          <!-- Final CTA -->
          <section class="text-center py-4">
            <div class="cta-box bg-primary-gradient text-white p-5 rounded-3">
              <h3 class="fw-bold mb-3">Ready to Start Practicing?</h3>
              <p class="lead mb-4">Take our diagnostic test to identify your strengths and weaknesses</p>
              <a href="#" class="btn btn-light btn-lg px-5 fw-bold">
                <i class="bi bi-play-circle-fill me-1"></i> Begin Practice Test
              </a>
            </div>
          </section>
        </div>
      </article>
    </div>
  </div>
</div>

<style>
.practice-resources {
  background: white;
  box-shadow: 0 5px 30px rgba(0,0,0,0.1);
}

.resources-header {
  background: linear-gradient(135deg, #1976D2 0%, #2196F3 100%);
  position: relative;
  overflow: hidden;
}

.resources-nav .nav-link {
  border-radius: 20px;
  padding: 0.5rem 1.25rem;
  transition: all 0.3s ease;
}

.resources-nav .nav-link.active {
  background: #1976D2;
  color: white;
}

.resource-card {
  transition: all 0.3s ease;
  border-radius: 0.5rem;
  overflow: hidden;
}

.resource-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.resource-card .card-img-top {
  transition: all 0.3s ease;
}

.resource-card:hover .card-img-top {
  opacity: 0.9;
}

.resource-features {
  list-style: none;
  padding-left: 0;
}

.resource-features li {
  margin-bottom: 0.5rem;
}

.book-comparison th {
  white-space: nowrap;
}

.platform-tabs .nav-link {
  font-weight: 500;
}

.app-card {
  background: white;
  transition: all 0.3s ease;
}

.app-card:hover {
  transform: scale(1.03);
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.study-plan-generator {
  border-left: 4px solid #1976D2;
}

.generate-plan-btn {
  transition: all 0.3s ease;
}

.generate-plan-btn:hover {
  transform: translateY(-2px);
}

.plan-result {
  animation: fadeIn 0.5s ease-out;
}

.cta-box {
  position: relative;
  overflow: hidden;
}

.cta-box::after {
  content: '';
  position: absolute;
  top: -50%;
  right: -50%;
  width: 100%;
  height: 200%;
  background: url('https://img.freepik.com/free-vector/abstract-blue-circle-background_52683-63457.jpg') center/cover;
  opacity: 0.1;
  z-index: 0;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 768px) {
  .resources-nav .nav {
    flex-wrap: nowrap;
    overflow-x: auto;
    justify-content: flex-start;
  }
  
  .book-comparison {
    font-size: 0.85rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize app carousel
  if (typeof OwlCarousel !== 'undefined') {
    $('.app-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: { items: 1 },
        576: { items: 2 },
        768: { items: 3 }
      }
    });
  }

  // Study plan generator
  const generateBtn = document.querySelector('.generate-plan-btn');
  if (generateBtn) {
    generateBtn.addEventListener('click', function() {
      const planResult = document.querySelector('.plan-result');
      const planSchedule = document.querySelector('.plan-schedule');
      
      // Simulate loading
      this.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Generating...';
      
      setTimeout(() => {
        this.innerHTML = '<i class="bi bi-magic me-1"></i> Generate My Plan';
        
        // Sample plan (in real app this would be dynamic)
        planSchedule.innerHTML = `
          <div class="plan-week mb-3">
            <h5 class="d-flex align-items-center">
              <span class="badge bg-primary me-2">Week 1</span>
              <span>Listening Focus</span>
            </h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Monday
                <span class="badge bg-primary rounded-pill">30m Practice Test</span>
              </li>
              <!-- Additional days -->
            </ul>
          </div>
          <div class="plan-week">
            <h5 class="d-flex align-items-center">
              <span class="badge bg-success me-2">Week 2</span>
              <span>Full Test Practice</span>
            </h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Monday
                <span class="badge bg-success rounded-pill">Full Test</span>
              </li>
              <!-- Additional days -->
            </ul>
          </div>
        `;
        
        planResult.style.display = 'block';
      }, 1500);
    });
  }

  // Effectiveness chart
  const ctx = document.getElementById('effectivenessChart');
  if (ctx) {
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Official Tests', 'Prep Books', 'Online Courses', 'Mobile Apps'],
        datasets: [{
          label: 'Score Improvement',
          data: [185, 145, 165, 120],
          backgroundColor: [
            'rgba(25, 118, 210, 0.7)',
            'rgba(56, 142, 60, 0.7)',
            'rgba(255, 152, 0, 0.7)',
            'rgba(156, 39, 176, 0.7)'
          ],
          borderColor: [
            'rgba(25, 118, 210, 1)',
            'rgba(56, 142, 60, 1)',
            'rgba(255, 152, 0, 1)',
            'rgba(156, 39, 176, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: function(context) {
                return 'Average score increase: +' + context.raw + ' points';
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            title: { display: true, text: 'Score Improvement' }
          }
        }
      }
    });
  }

  // Scroll animations
  const animateOnScroll = function() {
    const elements = document.querySelectorAll('.animate__animated');
    
    elements.forEach(element => {
      const elementPosition = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      
      if (elementPosition < windowHeight - 100) {
        const animationClass = element.classList.item(1);
        element.classList.add(animationClass);
      }
    });
  };

  window.addEventListener('scroll', animateOnScroll);
  animateOnScroll();
});
</script>
@endsection