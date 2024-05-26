<div>
    <style>
        .modal {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-dialog {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            max-width: 400px;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
        }
        .modal-title {
            font-size: 1.5rem;
        }
        .modal-body {
            display: flex;
            flex-direction: column;
        }
        .modal-footer {
            display: flex;
            justify-content: space-between;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-control {
            padding: 0.5rem;
        }
        .btn {
            padding: 0.5rem 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
    </style>
    <div>
    @if($scoresheet->achievements->contains('award_id', $award->id))
        @php $achievement = $scoresheet->achievements->where('award_id', $award->id)->first() @endphp
        <div class='py-2' wire:click="open">
            <span class="text-base p-1 rounded" style='background-color: green; color: white;'>
                &#x2713; {{ $achievement->date }}
            </span>
            @if($award->has_points)
                &nbsp;
                <span class="text-base p-1 rounded" style='background-color: #66806688; color: white;'>
                    {{ $achievement->points }} points
                </span>
            @endif
        </div>
    @else
        <button type='button' class="btn border px-8 rounded mx-2" style='border-color: #ff000066; color: #ff000066;' wire:click="open">
            + {{ $isOpen ? 'Close' : 'Add' }} {{ $award->name }}
        </button>
    @endif
            <div class="modal" id="add-achievement-popup" tabindex="-1" role="dialog" style="display:{{ $isOpen ? 'block' : 'none' }};">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Add Achievement</h2>
                            <button type="button" class="close" wire:click="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <form wire:submit.prevent="addAchievement">
                                <div class="form-group mb-4">
                                    <label for="date">Date</label>
                                    <input type="date"
                                        class="form-control border"
                                        id="date"
                                        wire:model="dateAchieved"
                                        min="{{ date('Y-m-d', strtotime($scoresheet->created_at)) }}"
                                        max="{{ date('Y-m-d') }}"
                                    >
                                    @error('date') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                @if ($award->has_points)
                                    <div class="form-group mb-4">
                                        <label for="points">Points</label>
                                        <input type="number" class="form-control border" id="points" wire:model="points">
                                        @error('points') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="close">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="addAchievement">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>