<div class="row">
    <div class="col-lg-12">
        <div class="card border">
            <div class="card-body">
                <div class="row">
                    @foreach ($pollings as $polling)
                        @php
                            $alreadyResponded = in_array($polling->id, $respondedPollingIds);
                        @endphp

                        @if ($alreadyResponded)
                            <p>Anda sudah menjawab polling ini</p>
                        @else
                            <div class="card mb-4 border">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">{{ $polling->title }}</h5>
                                    <small>Periode:
                                        {{ \Carbon\Carbon::parse($polling->start_time)->format('d M Y H:i') }} -
                                        {{ \Carbon\Carbon::parse($polling->end_time)->format('d M Y H:i') }}</small>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('about.polling.submit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="polling_id" value="{{ $polling->id }}">

                                        @foreach ($polling->questions as $question)
                                            <div class="mb-4">
                                                <label class="form-label fw-bold">{{ $question->question_text }}</label>

                                                @if ($question->question_type === 'multiple_choice')
                                                    @php
                                                        $choices = $question->choice_descriptions ?? [];
                                                    @endphp
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="answers[{{ $question->id }}]"
                                                                id="q{{ $question->id }}_{{ $i }}"
                                                                value="{{ $i }}" required>
                                                            <label class="form-check-label"
                                                                for="q{{ $question->id }}_{{ $i }}">
                                                                {{ $i }} - {{ $choices[$i] ?? '' }}
                                                            </label>
                                                        </div>
                                                    @endfor
                                                @elseif ($question->question_type === 'text')
                                                    <textarea name="answers[{{ $question->id }}]" rows="3" class="form-control" minlength="15" maxlength="100"
                                                        required placeholder="Jawaban minimal 15 kata, maksimal 100 kata."></textarea>
                                                @endif
                                            </div>
                                        @endforeach

                                        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <!-- end col -->
                </div>
            </div>
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
