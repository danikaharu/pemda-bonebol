<div class="row">
    <div class="mb-3 col-md-6">
        <label for="username" class="form-label">Username <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('username') is-invalid @enderror" type="text" name="username"
            value="{{ isset($user) ? $user->username : old('username') }}" />
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="email" class="form-label">Email <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
            value="{{ isset($user) ? $user->email : old('email') }}" />
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="password" class="form-label">Password <span class="text-danger">
                &#42;</span></label>
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" />
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="password" class="form-label">Konfirmasi Password <span class="text-danger">
                &#42;</span></label>
        <input class="form-control" type="password" name="password_confirmation" />
    </div>
    <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Nama <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
            value="{{ isset($user) ? $user->name : old('name') }}" />
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @empty($user)
        <div class="col-md-6">
            <div class="form-group">
                <label for="role">{{ __('Role') }} <span class="text-danger">
                        &#42;</span></label>
                <select class="form-control @error('role')
                    is-invalid
                @enderror"
                    name="role" id="role">
                    <option selected disabled>-- Pilih role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endempty

    @isset($user)
        <div class="col-md-6">
            <div class="form-group">
                <label for="role">{{ __('Role') }}</label>
                <select class="form-control @error('role')
                is-invalid
            @enderror" name="role"
                    id="role">
                    <option selected disabled>{{ __('-- Pilih role --') }}</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ $user->getRoleNames()->toArray() !== [] && $user->getRoleNames()[0] == $role->name ? 'selected' : '-' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endisset
</div>
