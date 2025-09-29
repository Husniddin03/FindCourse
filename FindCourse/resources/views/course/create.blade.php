<x-layout>

    <x-slot:title>

        Yangi o‘quv markaz qo‘shish - FindCourse

    </x-slot>
    <main>
        <div class="container">
            <h2>Yangi o‘quv markaz qo‘shish</h2>

            <form action="{{ route('learning-centers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nomi</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Turi</label>
                    <input type="text" name="type" id="type" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="about" class="form-label">Haqida</label>
                    <textarea name="about" id="about" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="province" class="form-label">Viloyat</label>
                    <input type="text" name="province" id="province" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="region" class="form-label">Tuman</label>
                    <input type="text" name="region" id="region" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Manzil</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location (Google Maps link yoki koordinata)</label>
                    <input type="text" name="location" id="location" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="usersId" class="form-label">Foydalanuvchi</label>
                    <select name="usersId" id="usersId" class="form-select" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="studentCount" class="form-label">O‘quvchilar soni</label>
                    <input type="number" name="studentCount" id="studentCount" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Saqlash</button>
                <a href="{{ route('pages.index') }}" class="btn btn-secondary">Bekor qilish</a>
            </form>
        </div>
    </main>
</x-layout>
