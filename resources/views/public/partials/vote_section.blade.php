@section('style')
    <style>
        .model-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 25px !important;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 350px;
            /* animation: fadeInUp 0.6s ease-out; */
        }

        .model-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 48px rgba(0, 255, 255, 0.2);
        }


        .model-image-container {
            position: relative;
            overflow: hidden;
            height: 300px;
        }

        .model-image {
            width: 100%;
            height: 100%;
            object-fit: fit;
            transition: transform 0.5s ease;
        }

        .model-card:hover .model-image {
            transform: scale(1.1);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
        }

        .card-content {
            padding: 25px;
            position: relative;
        }

        .model-name {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: slideInLeft 0.6s ease-out 0.2s both;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .votes-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
            animation: slideInRight 0.6s ease-out 0.3s both;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .votes-label {
            color: #a0a0a0;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .votes-count {
            color: #00ffff;
            font-size: 32px;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .vote-btn {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(45deg, #aeca31, #a0a0a0);
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: slideInUp 0.6s ease-out 0.4s both;
            box-shadow: 0 4px 15px rgba(0, 255, 255, 0.4);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .vote-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .vote-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .vote-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 255, 255, 0.6);
        }

        .vote-btn:active {
            transform: scale(0.98);
        }

        .vote-btn span {
            position: relative;
            z-index: 1;
        }

        @keyframes neonPulse {

            0%,
            100% {
                box-shadow: 0 4px 15px rgba(0, 255, 255, 0.4);
            }

            50% {
                box-shadow: 0 4px 25px rgba(255, 0, 255, 0.6);
            }
        }

        .vote-btn {
            animation: slideInUp 0.6s ease-out 0.4s both, neonPulse 2s ease-in-out infinite;
        }
    </style>
@endsection

{{-- {{ dd($event->participants) }} --}}
@foreach ($event->participants as $p)
    <div class="item">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="model-card">
                        <div class="model-image-container">
                            <img src="{{ $p->user->onboardedImage->modelPhoto->photo_path }}" alt="Model"
                                class="model-image">
                            <div class="image-overlay"></div>
                        </div>
                        <div class="card-content">
                            <h2 class="model-name">{{ $p->user->name }}</h2>
                            <div class="votes-container">
                                <span class="votes-label">Total Votes:</span>
                                <span class="votes-count">{{ $p->votes->count() }}</span>
                            </div>
                            @auth
                                @php
                                    $vote = App\Models\Vote::where('voter_id', Auth::user()->id)
                                        ->where('event_id', $event->id)
                                        ->first();
                                    // dd();
                                @endphp
                                {{-- If Users has not voted allow him to vote , else restrict --}}
                                @if (!$vote)
                                    <form action="{{ route('vote.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="participation_id" value="{{ $p->id }}">
                                        <input type="hidden" name="voter_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <input type="submit" class="vote-btn" value="Vote Now">
                                    </form>
                                @else
                                    <input type="submit" class="vote-btn" value="Already Voted" disabled>
                                @endif
                            @else
                                <a href="{{ route('user.login', ['redirect' => url()->current()]) }}">
                                    <input type="submit" class="vote-btn" value="Login To Vote">
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach




@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endpush
