<x-layout>

    <x-slot:title>

        Blog Grid - FindCourse

    </x-slot>

    <!-- ===== Blog Grid Start ===== -->
    <section class="ji gp uq">
        <div class="bb ye ki xn vq jb jo">
            <div class="animate_top fb">
                <form action="#">
                    <div class="i">
                        <input type="text" placeholder="Search Here..."
                            class="vd sm _g ch pm vk xm rg gm dm/40 dn/40 li mi" />

                        <button class="h r q _h">
                            <svg class="th ul ml il" width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875Z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="wc qf pn xo zf iq">
                <!-- Blog Item -->
                @foreach ($LearningCenters as $LearningCenter)
                    <div class="animate_top sg vk rm xm">
                        <div class="c rc i z-1 pg">
                            <img class="w-full" src="{{ asset('storage/' . $LearningCenter->logo) }}" alt="Blog" />

                            <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                <a href="{{ route('blog-single', $LearningCenter->id) }}"
                                    class="vc ek rg lk gh sl ml il gi hi">Ko'proq o'qish</a>
                            </div>
                        </div>

                        <div class="yh">
                            <div class="tc uf wf ag jq">
                                <div class="tc wf ag">
                                    <p>{{ $LearningCenter->region . ' ' . $LearningCenter->province }}</p>
                                </div>
                                <div class="tc wf ag">
                                    <img src="{{ asset('images/icon-calender.svg') }}" alt="Calender" />
                                    <p>25 Dec, 2025</p>
                                </div>
                            </div>
                            <h4 class="ek tj ml il kk wm xl eq lb">
                                <a
                                    href="{{ route('blog-single', $LearningCenter->id) }}">{{ $LearningCenter->name }}</a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mb lo bq i ua">
                <nav>
                    <ul class="tc wf xf bg">
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#!">
                                <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.93884 6.99999L7.88884 11.95L6.47484 13.364L0.11084 6.99999L6.47484 0.635986L7.88884 2.04999L2.93884 6.99999Z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#!">
                                2
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#!">
                                3
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#!">
                                4
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#!">
                                ...
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#!">
                                12
                            </a>
                        </li>
                        <li>
                            <a class="c tc wf xf wd in zc hn rg uj fo wk xm ml il hh rm tl zm yl an" href="#!">
                                <svg class="th lm ml il" width="8" height="14" viewBox="0 0 8 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.06067 7.00001L0.110671 2.05001L1.52467 0.636014L7.88867 7.00001L1.52467 13.364L0.110672 11.95L5.06067 7.00001Z"
                                        fill="#fefdfo" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination -->
        </div>
    </section>
    <!-- ===== Blog Grid End ===== -->

</x-layout>
