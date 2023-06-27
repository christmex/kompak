## TODO
- [x] Dibagian menu cari kuesioner, card yang ditampilkan harus dilakukan pengecekan,jikla target sudah tercapai maka tidak perlu ditampilkan lagi di halaman tersebut
- [ ] Cara menghitung persoalan di atas adalah
    hitung semua responder yang statusnya sudah di accepted/3 kemudian bandingkan dengan targetnya, jika jumlah responder dengan status 3 >= target, maka tidak perlu ditampilkan

- [x] Buat custom operation untuk handle answer kuisioner 
- [x] Buat custom operation pemilik kuesioner punya button di menu responder untuk set sebagai accepted or feedback
- [x] Jika pemilik kuisioner memiliki responder yang sudah di acc dan memiliki kuisioner namu si pemilik tidak menjadi responder pada kuisioner responder maka kuisioner pemilik tidak akan bisa menerima responder baru kuisionernya tidak akan tampil di pencarian
- [x] Menu responder tidak bisa melakukan penambahan secara manual, hilangkan akses ke button dan form create responder
- [x] embed link harusnya bukan tag iframe, tapi link url saja, kita pikirkan nnti ya
- [ ] ganti setiap error message sehingga pengguna lebih paham, contohnya responder description feedback, "The responder description feedback field is required when responder request type id is 4." jangan gunakan ini
- [ ] lakukan pengecekan apakah user_id yang dikirim sama dengan user_id yang ada di tabel responder? ini dibagian responderrequest
- [x] Tombol saya mau bantu di menu cari kuisioner harus di ubah, redirect ke responder seperti yang dilakukan di menu kuesioner yang saya isi
- [ ] Buat hall of fame untuk bug hunter
- [ ] Coba tembak url di bagisn edit responder, jika masih membuka responder maka bisa dan hanya yang bersangkutan yang bisa buka, jika tidak maka tidak bisa
- [ ] adaerror saat owner melakukan accept questioner, dibagian proof, selalu gagal di save gagal di validation, karna value ngg ada