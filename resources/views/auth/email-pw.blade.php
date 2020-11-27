<x-input-basic name="email" type="email" label="Alamat email" 
placeholder="{{ $placeholderEmail }}" 
value="{{ App\Models\User::where('role', '!=', 'admin')->inRandomOrder()->first()->email }}" required />
<x-input-basic name="password" type="password" label="Kata sandi" 
placeholder="{{ $placeholderPw }}" value="{{ 'password' }}" required />