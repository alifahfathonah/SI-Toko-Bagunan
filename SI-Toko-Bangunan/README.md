# Tahap Memulai Mengerjakan Project

## 1. Setelah melelakukan `git clone` atau download project, buka terminal/cmd/git bash lalu lakukan `composer install`.
## 2. Selanjutnya buat file .env yang dicopy dari file .env.example, untuk koneksi database sesuaikan dengan username,password,dan nama db yang ada pada local computer (jika bekerja dengan db).
## 3. Setelah pada terminal/cmd/git bash lakukan `php artisan key:generate`
## 4. Buka project pada text editor (sublime,vscode)
## 5. terdapat 3 branch , yaitu `master`, `frontend`, `backend` , sebelum bekerja pindah ke branch sesuai role pekerjaan. contoh jika frontend maka command pada terminal/cmd/git bash yaitu `git checkout frontend`. 
## 6. Sebelum bekerja pada  terminal/cmd/git bash lakukan `git pull origin master` untuk mendapatkan update an terbaru dari master
## 7. Setelah pekerjaan selesai lakukan `git add .` , laku `git commit -m [PERUBAHAN YANG DILAKUKAN]`
## 8. Setelah itu lakukan `git push`.
## 9. Agar pekerjaan dalam digabungkan dengan master, lakukan pull request pada github.
## 10. beberapa proses git dapat dilakukan dngan mudah di vscode, seperti berpindah branch, git add, commit dan push.

