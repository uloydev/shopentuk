<x-input-basic name="email" type="email" label="Alamat email" 
placeholder="{{ $placeholderEmail }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
<x-input-basic name="password" type="password" label="Kata sandi" 
placeholder="{{ $placeholderPw }}" required />