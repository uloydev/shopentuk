@csrf
<div class="mb-6">
    <label for="title" class="block mb-2 required-input">
        <span class="text-gray-700">Title</span>
    </label>
    <input type="text" id="title" name="title" value="{{ old('title') }}"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="name" class="block mb-2 required-input">
        <span class="text-gray-700">Name</span>
    </label>
    <input type="text" id="name" name="name" value="{{ old('name') }}"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="email" class="block mb-2 required-input">
        <span class="text-gray-700">Email</span>
    </label>
    <input type="text" id="email" name="email" value="{{ old('email') }}"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="phone" class="block mb-2 required-input">
        <span class="text-gray-700">Phone</span>
    </label>
    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" 
    maxlength="13" minlength="6"
    class="form-input mt-1 block w-full border-gray-400" required>
</div>
<div class="mb-6 lg:col-span-full">
    <label class="block required-input" for="street_address">
        <span class="text-gray-700">
            Street Address
        </span>
    </label>
    <textarea id="street_address" class="form-textarea mt-1 block w-full" 
    rows="3" placeholder="Masukan nama jalanmu" 
    name="street_address" required>{{ old('street_address') }}</textarea>
</div>
<div class="mb-6">
    <label for="kelurahan" class="block mb-2 required-input">
        <span class="text-gray-700">Kelurahan</span>
    </label>
    <input type="text" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="kecamatan" class="block mb-2 required-input">
        <span class="text-gray-700">Kecamatan</span>
    </label>
    <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="city" class="block mb-2 required-input">
        <span class="text-gray-700">City</span>
    </label>
    <input type="text" id="city" name="city" value="{{ old('city') }}"
    class="form-input mt-1 block w-full border-gray-400" required>

</div>
<div class="mb-6">
    <label for="province" class="block mb-2 required-input">
        <span class="text-gray-700">Province</span>
    </label>
    <select id="province" name="province_id" value="{{ old('province_id') }}"
    class="form-input mt-1 block w-full border-gray-400" required>
        <option value="" disabled selected>pilih provinsi</option>
        @foreach ($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
    </select>

</div>
<div class="mb-6 lg:col-span-full">
    <label for="postal_code" class="block mb-2 required-input">
        <span class="text-gray-700">Postal Code</span>
    </label>
    <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}"
    class="form-input mt-1 block w-ful border-gray-400" required>

</div>
<div class="block mb-6 lg:col-span-full">
    <label for="" class="required-input">
        <span class="text-gray-700">
            Jadikan sebagai alamat utama ?
        </span>
    </label>
    <div class="mt-2 flex space-x-5">
        <x-input-checkbox label="ya" name="is_main_address" id="main1" 
        value="1" is-required="true" />
        <x-input-checkbox label="tidak" name="is_main_address" id="main0"
        value="0" is-checked="true" is-required="true" />
    </div>
</div>