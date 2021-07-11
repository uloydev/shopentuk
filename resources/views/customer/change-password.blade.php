<div class="modal fade" id="modalChangePasswordUser" tabindex="-1" role="dialog" aria-labelledby="modal-edit-rule-label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-capitalize" id="modalChangePasswordUserLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{-- route set on manage-customer.js --}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-input-template name="password" type="password" label="New Password" required></x-input-template>
                    <x-input-template name="password_confirmation" type="password" label="Confirm New Password"
                        required></x-input-template>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
