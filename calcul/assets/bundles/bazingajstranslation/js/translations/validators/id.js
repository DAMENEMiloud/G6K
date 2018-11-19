(function (t) {
// id
t.add("This value should be false.", "Nilai ini harus bernilai salah.", "validators", "id");
t.add("This value should be true.", "Nilai ini harus bernilai benar.", "validators", "id");
t.add("This value should be of type {{ type }}.", "Nilai ini harus bertipe {{ type }}.", "validators", "id");
t.add("This value should be blank.", "Nilai ini harus kosong.", "validators", "id");
t.add("The value you selected is not a valid choice.", "Nilai yang dipilih tidak tepat.", "validators", "id");
t.add("You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.", "Anda harus memilih paling tidak {{ limit }} pilihan.", "validators", "id");
t.add("You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.", "Anda harus memilih paling banyak {{ limit }} pilihan.", "validators", "id");
t.add("One or more of the given values is invalid.", "Satu atau lebih nilai yang diberikan tidak sah.", "validators", "id");
t.add("This field was not expected.", "Ruas ini tidak diharapkan.", "validators", "id");
t.add("This field is missing.", "Ruas ini hilang.", "validators", "id");
t.add("This value is not a valid date.", "Nilai ini bukan merupakan tanggal yang sah.", "validators", "id");
t.add("This value is not a valid datetime.", "Nilai ini bukan merupakan tanggal dan waktu yang sah.", "validators", "id");
t.add("This value is not a valid email address.", "Nilai ini bukan alamat surel yang sah.", "validators", "id");
t.add("The file could not be found.", "Berkas tidak dapat ditemukan.", "validators", "id");
t.add("The file is not readable.", "Berkas tidak dapat dibaca.", "validators", "id");
t.add("The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.", "Ukuran berkas terlalu besar ({{ size }} {{ suffix }}). Ukuran maksimum yang diizinkan adalah {{ limit }} {{ suffix }}.", "validators", "id");
t.add("The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.", "Jenis berkas ({{ type }}) tidak sah. Jenis berkas yang diizinkan adalah {{ types }}.", "validators", "id");
t.add("This value should be {{ limit }} or less.", "Nilai ini harus {{ limit }} atau kurang.", "validators", "id");
t.add("This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.", "Nilai ini terlalu panjang. Seharusnya {{ limit }} karakter atau kurang.", "validators", "id");
t.add("This value should be {{ limit }} or more.", "Nilai ini harus {{ limit }} atau lebih.", "validators", "id");
t.add("This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.", "Nilai ini terlalu pendek. Seharusnya {{ limit }} karakter atau lebih.", "validators", "id");
t.add("This value should not be blank.", "Nilai ini tidak boleh kosong.", "validators", "id");
t.add("This value should not be null.", "Nilai ini tidak boleh 'null'.", "validators", "id");
t.add("This value should be null.", "Nilai ini harus 'null'.", "validators", "id");
t.add("This value is not valid.", "Nilai ini tidak sah.", "validators", "id");
t.add("This value is not a valid time.", "Nilai ini bukan merupakan waktu yang sah.", "validators", "id");
t.add("This value is not a valid URL.", "Nilai ini bukan URL yang sah.", "validators", "id");
t.add("The two values should be equal.", "Isi keduanya harus sama.", "validators", "id");
t.add("The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.", "Ukuran berkas terlalu besar. Ukuran maksimum yang diizinkan adalah {{ limit }} {{ suffix }}.", "validators", "id");
t.add("The file is too large.", "Ukuran berkas terlalu besar.", "validators", "id");
t.add("The file could not be uploaded.", "Berkas tidak dapat diunggah.", "validators", "id");
t.add("This value should be a valid number.", "Nilai ini harus angka yang sah.", "validators", "id");
t.add("This file is not a valid image.", "Berkas ini tidak termasuk citra.", "validators", "id");
t.add("This is not a valid IP address.", "Ini bukan alamat IP yang sah.", "validators", "id");
t.add("This value is not a valid language.", "Nilai ini bukan bahasa yang sah.", "validators", "id");
t.add("This value is not a valid locale.", "Nilai ini bukan lokal yang sah.", "validators", "id");
t.add("This value is not a valid country.", "Nilai ini bukan negara yang sah.", "validators", "id");
t.add("This value is already used.", "Nilai ini sudah digunakan.", "validators", "id");
t.add("The size of the image could not be detected.", "Ukuran dari citra tidak bisa dideteksi.", "validators", "id");
t.add("The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.", "Lebar citra terlalu besar ({{ width }}px). Ukuran lebar maksimum adalah {{ max_width }}px.", "validators", "id");
t.add("The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.", "Lebar citra terlalu kecil ({{ width }}px). Ukuran lebar minimum yang diharapkan adalah {{ min_width }}px.", "validators", "id");
t.add("The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.", "Tinggi citra terlalu besar ({{ height }}px). Ukuran tinggi maksimum adalah {{ max_height }}px.", "validators", "id");
t.add("The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.", "Tinggi citra terlalu kecil ({{ height }}px). Ukuran tinggi minimum yang diharapkan adalah {{ min_height }}px.", "validators", "id");
t.add("This value should be the user's current password.", "Nilai ini harus kata sandi pengguna saat ini.", "validators", "id");
t.add("This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.", "Nilai ini harus memiliki tepat {{ limit }} karakter.", "validators", "id");
t.add("The file was only partially uploaded.", "Berkas hanya terunggah sebagian.", "validators", "id");
t.add("No file was uploaded.", "Tidak ada berkas terunggah.", "validators", "id");
t.add("No temporary folder was configured in php.ini.", "Direktori sementara tidak dikonfiguasi pada php.ini.", "validators", "id");
t.add("Cannot write temporary file to disk.", "Tidak dapat menuliskan berkas sementara ke dalam media penyimpanan.", "validators", "id");
t.add("A PHP extension caused the upload to fail.", "Sebuah ekstensi PHP menyebabkan kegagalan unggah.", "validators", "id");
t.add("This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.", "Kumpulan ini harus memiliki {{ limit }} elemen atau lebih.", "validators", "id");
t.add("This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.", "Kumpulan ini harus memiliki kurang dari {{ limit }} elemen.", "validators", "id");
t.add("This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.", "Kumpulan ini harus memiliki tepat {{ limit }} elemen.", "validators", "id");
t.add("Invalid card number.", "Nomor kartu tidak sah.", "validators", "id");
t.add("Unsupported card type or invalid card number.", "Jenis kartu tidak didukung atau nomor kartu tidak sah.", "validators", "id");
t.add("This is not a valid International Bank Account Number (IBAN).", "Ini bukan Nomor Rekening Bank Internasional (IBAN) yang sah.", "validators", "id");
t.add("This value is not a valid ISBN-10.", "Nilai ini bukan ISBN-10 yang sah.", "validators", "id");
t.add("This value is not a valid ISBN-13.", "Nilai ini bukan ISBN-13 yang sah.", "validators", "id");
t.add("This value is neither a valid ISBN-10 nor a valid ISBN-13.", "Nilai ini bukan ISBN-10 maupun ISBN-13 yang sah.", "validators", "id");
t.add("This value is not a valid ISSN.", "Nilai ini bukan ISSN yang sah.", "validators", "id");
t.add("This value is not a valid currency.", "Nilai ini bukan mata uang yang sah.", "validators", "id");
t.add("This value should be equal to {{ compared_value }}.", "Nilai ini seharusnya sama dengan {{ compared_value }}.", "validators", "id");
t.add("This value should be greater than {{ compared_value }}.", "Nilai ini seharusnya lebih dari {{ compared_value }}.", "validators", "id");
t.add("This value should be greater than or equal to {{ compared_value }}.", "Nilai ini seharusnya lebih dari atau sama dengan {{ compared_value }}.", "validators", "id");
t.add("This value should be identical to {{ compared_value_type }} {{ compared_value }}.", "Nilai ini seharusnya identik dengan {{ compared_value_type }} {{ compared_value }}.", "validators", "id");
t.add("This value should be less than {{ compared_value }}.", "Nilai ini seharusnya kurang dari {{ compared_value }}.", "validators", "id");
t.add("This value should be less than or equal to {{ compared_value }}.", "Nilai ini seharusnya kurang dari atau sama dengan {{ compared_value }}.", "validators", "id");
t.add("This value should not be equal to {{ compared_value }}.", "Nilai ini seharusnya tidak sama dengan {{ compared_value }}.", "validators", "id");
t.add("This value should not be identical to {{ compared_value_type }} {{ compared_value }}.", "Nilai ini seharusnya tidak identik dengan {{ compared_value_type }} {{ compared_value }}.", "validators", "id");
t.add("The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.", "Rasio citra terlalu besar ({{ ratio }}). Rasio maksimum yang diizinkan adalah {{ max_ratio }}.", "validators", "id");
t.add("The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.", "Rasio citra terlalu kecil ({{ ratio }}). Rasio minimum yang diharapkan adalah {{ min_ratio }}.", "validators", "id");
t.add("The image is square ({{ width }}x{{ height }}px). Square images are not allowed.", "Citra persegi ({{ width }}x{{ height }}px). Citra persegi tidak diizinkan.", "validators", "id");
t.add("The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.", "Citra berorientasi lanskap ({{ width }}x{{ height }}px). Citra berorientasi lanskap tidak diizinkan.", "validators", "id");
t.add("The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.", "Citra berorientasi potret ({{ width }}x{{ height }}px). Citra berorientasi potret tidak diizinkan.", "validators", "id");
t.add("An empty file is not allowed.", "Berkas kosong tidak diizinkan.", "validators", "id");
t.add("The host could not be resolved.", "Host tidak dapat diselesaikan.", "validators", "id");
t.add("This value does not match the expected {{ charset }} charset.", "Nilai ini tidak memenuhi set karakter {{ charset }} yang diharapkan.", "validators", "id");
t.add("This is not a valid Business Identifier Code (BIC).", "Ini bukan Business Identifier Code (BIC) yang sah.", "validators", "id");
t.add("Error", "Galat", "validators", "id");
t.add("This form should not contain extra fields.", "Gabungan kolom tidak boleh mengandung kolom tambahan.", "validators", "id");
t.add("The uploaded file was too large. Please try to upload a smaller file.", "Berkas yang di unggah terlalu besar. Silahkan coba unggah berkas yang lebih kecil.", "validators", "id");
t.add("The CSRF token is invalid. Please try to resubmit the form.", "CSRF-Token tidak sah. Silahkan coba kirim ulang formulir.", "validators", "id");
t.add("fos_user.username.already_used", "Nama pengguna telah digunakan.", "validators", "id");
t.add("fos_user.username.blank", "Masukkan nama pengguna.", "validators", "id");
t.add("fos_user.username.short", "Nama pengguna terlalu pendek.", "validators", "id");
t.add("fos_user.username.long", "Nama pengguna terlalu panjang.", "validators", "id");
t.add("fos_user.email.already_used", "Surel telah digunakan.", "validators", "id");
t.add("fos_user.email.blank", "Masukkan alamat surel.", "validators", "id");
t.add("fos_user.email.short", "Alamat surel terlalu pendek.", "validators", "id");
t.add("fos_user.email.long", "Alamat surel terlalu panjang.", "validators", "id");
t.add("fos_user.email.invalid", "Alamat surel salah.", "validators", "id");
t.add("fos_user.password.blank", "Masukkan kata sandi.", "validators", "id");
t.add("fos_user.password.short", "Kata sandi terlalu pendek.", "validators", "id");
t.add("fos_user.password.mismatch", "kata sandi yang anda masukkan tidak sama.", "validators", "id");
t.add("fos_user.new_password.blank", "Masukkan kata sandi baru.", "validators", "id");
t.add("fos_user.new_password.short", "Kata sandi baru anda terlalu pendek.", "validators", "id");
t.add("fos_user.current_password.invalid", "Kata sandi yang anda masukkan salah.", "validators", "id");
t.add("fos_user.group.blank", "Masukkan nama.", "validators", "id");
t.add("fos_user.group.short", "Nama terlalu pendek.", "validators", "id");
t.add("fos_user.group.long", "Nama terlalu panjang.", "validators", "id");
t.add("fos_group.name.already_used", "Nama telah digunakan.", "validators", "id");
})(Translator);