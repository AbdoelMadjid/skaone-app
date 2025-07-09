<div class="row">
    <div class="col-xl-6 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">Polling</div>
                <div class="ribbon-content mt-5 text-muted">
                    @foreach ($pollings as $polling)
                        @php
                            $alreadyResponded = in_array($polling->id, $respondedPollingIds);
                        @endphp

                        @if ($alreadyResponded)
                            <div class="alert alert-success">
                                Anda sudah menjawab polling: <strong>{{ $polling->title }}</strong>
                            </div>
                        @else
                            <div class="card mb-4 border">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0 text-white">{{ $polling->title }}</h5>
                                    <small>Periode:
                                        {{ \Carbon\Carbon::parse($polling->start_time)->format('d M Y H:i') }} -
                                        {{ \Carbon\Carbon::parse($polling->end_time)->format('d M Y H:i') }}</small>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('websiteapp.pollingsubmit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="polling_id" value="{{ $polling->id }}">

                                        {{-- ✅ Letakkan logic pengurutan/acak soal di sini --}}
                                        @php
                                            $mcQuestions = $polling->questions
                                                ->where('question_type', 'multiple_choice')
                                                ->shuffle();
                                            $textQuestions = $polling->questions
                                                ->where('question_type', 'text')
                                                ->shuffle();
                                            $sortedQuestions = $mcQuestions->concat($textQuestions);
                                        @endphp

                                        @foreach ($sortedQuestions as $question)
                                            <div class="mb-4">
                                                <label class="form-label fw-bold">{{ $question->question_text }}</label>

                                                @if ($question->question_type === 'multiple_choice')
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="answers[{{ $question->id }}]"
                                                                id="q{{ $question->id }}_{{ $i }}"
                                                                value="{{ $i }}" required>
                                                            <label class="form-check-label"
                                                                for="q{{ $question->id }}_{{ $i }}">
                                                                {{ $i }} -
                                                                {{ $question->choice_descriptions[$i] ?? '' }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                @elseif ($question->question_type === 'text')
                                                    <textarea name="answers[{{ $question->id }}]" rows="3" class="form-control" minlength="3" maxlength="100"
                                                        required placeholder="Jawaban minimal 3 kata, maksimal 100 kata."></textarea>
                                                @endif
                                            </div>
                                        @endforeach

                                        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <!-- Rounded Ribbon -->
        <div class="card ribbon-box border shadow-none mb-lg-4">
            <div class="card-body">
                <div class="ribbon ribbon-info round-shape">Yang sudah Polling</div>
                <div class="ribbon-content mt-5 text-muted">
                    @forelse ($usersWhoPolled as $u)
                        <i class="mdi mdi-account"></i> {{ $u->name }}<br>
                    @empty
                        Belum ada yang mengisi polling.
                    @endforelse
                    <br><br>

                </div>
            </div>
        </div>
    </div>
</div>
