<div class="my-3">
    <div class="row">
        <div class="col-6 d-grid">
            <button class="btn btn-success btn-block"  data-bs-toggle="modal" data-bs-target="#TopupModal">Deposit</button>
        </div>
        <div class="col-6 d-grid">
            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#WDModal">Withdraw</button>
        </div>
    </div>

    <!-- topup -->
    <div class="modal fade" id="TopupModal" tabindex="-1" aria-labelledby="TopupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TopupModalLabel">Topup Amount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input wire:model="amount" type="number" class="form-control" placeholder="Amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="topup('topup')" class="btn btn-success" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- widhraw -->
    <div class="modal fade" id="WDModal" tabindex="-1" aria-labelledby="WDModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="WDModalLabel"> Withdraw</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input wire:model="amount" type="number" class="form-control" placeholder="Amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="topup('withdraw')" class="btn btn-success" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
