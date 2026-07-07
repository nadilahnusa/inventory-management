@csrf

<div class="space-y-6">

    <x-card>

        <div class="grid grid-cols-1 gap-6">

            {{-- Name --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Full Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $user->name ?? '') }}"
                    placeholder="Input full name..."
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                @error('name')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Email --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $user->email ?? '') }}"
                    placeholder="Input email..."
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Role --}}
            <div>

                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Role
                </label>

                <select
                    name="role"
                    class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                    <option value="">-- Select Role --</option>

                    @foreach ($roles as $role)

                        <option
                            value="{{ $role->name }}"
                            @selected(old('role', isset($user) ? $user->getRoleNames()->first() : '') == $role->name)>

                            {{ $role->name }}

                        </option>

                    @endforeach

                </select>

                @error('role')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror

            </div>

            {{-- Password (Create Only) --}}
            @if(!isset($user))

                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Input password..."
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="mb-2 block text-sm font-medium text-gray-700">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm password..."
                        class="w-full rounded-xl border border-[#E5E7EB] px-4 py-3 focus:border-[#E31E24] focus:ring-[#E31E24]/10">

                </div>

            @endif

        </div>

    </x-card>

    <div class="flex justify-end gap-3">

        <x-button
            href="{{ route('users.index') }}"
            variant="secondary"
            icon="arrow_back">

            Cancel

        </x-button>

        <x-button
            type="submit"
            icon="save">

            {{ isset($user) ? 'Save Changes' : 'Save User' }}

        </x-button>

    </div>

</div>