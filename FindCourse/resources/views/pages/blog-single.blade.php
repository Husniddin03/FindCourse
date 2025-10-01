<x-layout>


    <x-slot:title>

        Blog Single - FindCourse

    </x-slot>

    <!-- ===== Blog Single Start ===== -->
    <section class="gj qp gr hj rp hr">
        <div class="bb ze ki xn 2xl:ud-px-0">
            <div class="tc sf yo zf kq">
                <div class="ro">
                    <div
                        class="animate_top rounded-md shadow-solid-13 bg-white dark:bg-blacksection border border-stroke dark:border-strokedark p-7.5 md:p-10">
                        <img src="{{ asset('storage/' . $LearningCenter->logo) }}" alt="Blog" />

                        <h2 class="ek vj 2xl:ud-text-title-lg kk wm nb gb">
                            {{ $LearningCenter->name }}
                        </h2>

                        <ul class="tc uf cg 2xl:ud-gap-15 fb">
                            <li><span class="rc kk wm">Saytga kiritgan shaxs:
                                </span> <a
                                    href="mailto:{{ $LearningCenter->user->email }}">{{ $LearningCenter->user->name }}</a>
                            </li>
                            <li><span class="rc kk wm">Yulangan sana: </span>
                                {{ $LearningCenter->created_at->translatedFormat('d F Y') }} </li>
                            <li><span class="rc kk wm"> Tur:
                                </span> {{ $LearningCenter->type }}</li>
                            <li><span class="rc kk wm"> Manzil:
                                </span> {{ $LearningCenter->address }}</li>
                            <li><span class="rc kk wm"> Joylashuv:
                                </span> <a style="color: cornflowerblue"
                                    href="{{ $LearningCenter->location }}">{{ substr($LearningCenter->location, 0, 20) }}</a>
                            </li>
                        </ul>

                        <p class="ob">
                            {{ $LearningCenter->about }}
                        </p>

                        <div class="wc qf pn dg cb">
                            @foreach ($LearningCenter->images as $image)
                                <img src="{{ asset('storage/' . $image->image) }}" alt="Blog" />
                            @endforeach
                        </div>

                        <h2 class="ek vj 2xl:ud-text-title-lg kk wm nb qb">
                            {{ $LearningCenter->name }} bilan bog'lanish.
                        </h2>

                        <ul class="tc wf bg sb">
                            <li>
                                <p class="sj kk wm tb">Ijtimoiy tarmoqlar:</p>
                            </li>

                            @foreach ($LearningCenter->connections as $connection)
                                <li>
                                    <a href="{{ $connection->url }}" class="tc wf xf yd ad rg ml il ih wk">
                                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/{{ strtolower($connection->connection->name) }}.svg"
                                            width="20" height="20" alt="{{ $connection->connection->name }}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>


                    </div>
                </div>

                <div class="jn/2 so">
                    <div class="animate_top fb">
                        <form action="#">
                            <div class="i">
                                <input type="text" placeholder="Search Here..."
                                    class="vd sm _g ch pm vk xm rg gm dm/40 dn/40 li mi" />

                                <button class="h r q _h">
                                    <svg class="th ul ml il" width="21" height="21" viewBox="0 0 21 21"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875Z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="animate_top fb">
                        <h4 class="tj kk wm qb">
                            Fanlar</h4>

                        <ul>
                            <li class="ql vb du-ease-in-out il xl">
                                <a href="#!">+ Fan qo'shish</a>
                            </li>
                            @foreach ($LearningCenter->subjects as $subject)
                                <li class="ql vb du-ease-in-out il xl">
                                    <a href="#!">{{ $subject->subject->name }}</a> <span>{{ $subject->price }}
                                        ming so'm</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="animate_top">
                        <h4 class="tj kk wm qb">Ustozlar</h4>

                        <div>

                            <div class="tc fg 2xl:ud-gap-6 qb">
                                <h6 class="wj kk wm xl bn ml il">
                                    <a href="#!">+ Ustoz qo'shish</a>
                                </h6>
                            </div>

                            @foreach ($LearningCenter->teachers as $teacher)
                                <div class="tc fg 2xl:ud-gap-6 qb">
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Blog" />
                                    <h5 class="wj kk wm xl bn ml il">
                                        <a href="#!">{{ $teacher->name }}</a>
                                    </h5>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="animate_top">
                        <iframe class="tc fg 2xl:ud-gap-6 qb" src="{{$LearningCenter->location}}&hl=uz&z=14&output=embed"
                            width="600" height="450" style="border:0;" allowfullscreen loading="lazy">
                        </iframe>
                    </div>

                    <div class="animate_top">
                        <h4 class="tj kk wm qb">Izohlar</h4>

                        <div>

                            <div class="tc fg 2xl:ud-gap-6 qb">
                                <h6 class="wj kk wm xl bn ml il">
                                    <a href="#!">+ Izoh qo'shish</a>
                                </h6>
                            </div>

                            @foreach ($LearningCenter->comments as $comment)
                                <div class="tc fg 2xl:ud-gap-6 qb">
                                    <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&background=random&size=64"
                                        alt="Blog" />
                                    <h5 class="wj kk wm xl bn ml il">
                                        <a href="#!">{{ $comment->comment }}</a>
                                    </h5>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ===== Blog Single End ===== -->



</x-layout>
