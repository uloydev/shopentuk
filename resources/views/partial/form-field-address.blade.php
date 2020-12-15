@csrf
<div class="mb-6">
    <label for="title" class="block mb-2 required-input">
        <span class="text-gray-700">Title</span>
    </label>
    <input type="text" id="title" name="title" 
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="name" class="block mb-2 required-input">
        <span class="text-gray-700">Name</span>
    </label>
    <input type="text" id="name" name="name"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="email" class="block mb-2 required-input">
        <span class="text-gray-700">Email</span>
    </label>
    <input type="text" id="email" name="email"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="phone" class="block mb-2 required-input">
        <span class="text-gray-700">Phone</span>
    </label>
    <input type="text" id="phone" name="phone"
    class="form-input mt-1 block w-full border-gray-400" required>
</div>
<div class="mb-6 lg:col-span-full">
    <label class="block required-input" for="street_address">
        <span class="text-gray-700">
            Street Address
        </span>
    </label>
    <textarea id="street_address" class="form-textarea mt-1 block w-full" rows="3" 
    placeholder="Masukan nama jalanmu" name="street_address" required></textarea>
</div>
<div class="mb-6">
    <label for="kelurahan" class="block mb-2 required-input">
        <span class="text-gray-700">Kelurahan</span>
    </label>
    <input type="text" id="kelurahan" name="kelurahan"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="kecamatan" class="block mb-2 required-input">
        <span class="text-gray-700">Kecamatan</span>
    </label>
    <input type="text" id="kecamatan" name="kecamatan"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="city" class="block mb-2 required-input">
        <span class="text-gray-700">City</span>
    </label>
    <input type="text" id="city" name="city"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="province" class="block mb-2 required-input">
        <span class="text-gray-700">Province</span>
    </label>
    <input type="text" id="province" name="province_id"
    class="form-input mt-1 block w-full border-gray-400"
        required>

</div>
<div class="mb-6 lg:col-span-full">
    <label for="postal_code" class="block mb-2 required-input">
        <span class="text-gray-700">Postal Code</span>
    </label>
    <input type="text" id="postal_code" name="postal_code"
    class="form-input mt-1 block w-ful border-gray-400"required>

</div>
<div class="block mb-6 lg:col-span-full">
    <label for="" class="required-input">
        <span class="text-gray-700">
            Jadikan sebagai alamat utama ?
        </span>
    </label>
    <div class="mt-2 flex">
        <div class="mr-5">
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio" name="is_main_address" value="1" id="main1">
                <span>
                    ya
                </span>
            </label>
        </div>
        <div class="ml-2">
            <label class="inline-flex items-center">
                <input type="radio" class="form-radio" name="is_main_address" value="0" id="main0">
                <span>
                    tidak
                </span>
            </label>
        </div>
    </div>
</div>