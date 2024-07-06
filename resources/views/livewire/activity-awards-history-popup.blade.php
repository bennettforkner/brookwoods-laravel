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
    <button type='button' class="btn border px-6 rounded mx-2" style='border-color: #ff000066; color: #ff000066;padding: 2px 8px;' wire:click="open">
        Awards Report
    </button>
            <div class="modal" id="run-report-popup" tabindex="-1" role="dialog" style="display:{{ $isOpen ? 'block' : 'none' }};">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Run Awards Report</h2>
                            <button type="button" class="close" wire:click="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <form wire:submit.prevent="launchReport">
                                <div class="form-group mb-4">
                                    <label for="startDate">Start Date</label>
                                    <input type="date"
                                        class="form-control border"
                                        id="startDate"
                                        wire:model="startDate"
                                    >
                                    @error('startDate') <span class="text-red-500">{{ $message }}</span> @enderror
                                    
                                    <label for="endDate">End Date</label>
                                    <input type="date"
                                        class="form-control border"
                                        id="endDate"
                                        wire:model="endDate"
                                    >
                                    @error('endDate') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="close">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="launchReport">Go</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>