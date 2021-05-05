<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modal-edit-rule-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modalEditUserLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{-- route set on manage-customer.js --}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-input-template id="inputPhone"
                        label="Phone Number"
                        name="phone" type="text"
                        add-class="text-capitalize" required />
                    <x-input-template id="inputPemilikRekening"
                    label="Pemilik Rekening"
                    name="pemilik_rekening" type="text"
                    add-class="text-capitalize" required />
                    <x-input-template id="inputBank"
                        label="Bank"
                        name="bank" type="text"
                        add-class="text-capitalize" required />
                    <x-input-template id="inputRekening"
                    label="Rekening"
                    name="rekening" type="number"
                    add-class="text-capitalize" required />
                    <button type="submit" class="btn waves-effect waves-light btn-primary">
                        Update User
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>