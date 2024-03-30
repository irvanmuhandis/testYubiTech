<a name="readme-top"></a>

<div align="center">

  <h3 align="center">Technical Test Yubi Technology</h3>

  <p align="center">
   </p>
</div>




<!-- ABOUT THE PROJECT -->
## About The Project

![alt text](image.png)

This is assignment for test placement in PT.Yubi Technology.

## Diketahui: 
Perusahaan ABCD ingin membuat aplikasi yang memiliki kemampuan untuk mencatat orderan pesanan dari client dengan spesifikasi sebagai berikut.

![WhatsApp Image 2023-12-22 at 15 36 50](https://github.com/YubiRepo/Backend-Test-Dev/assets/62506582/d2b1b30d-04b0-41e4-831f-6d81e618afda)


1. Data Style: informasi perihal product (cukup isi data saja di database, tidak perlu di buat UI nya).

      | Name           | Desc                      |
      |----------------|---------------------------|
      | Hair Punk | Week Style Kekinian            |
      | Yellow Rainbow | Week Style Kidz Zaman Now |
      | Relic Style | Week Style Classic           |

3. Color Method: informasi metode warna (cukup isi data saja di database, tidak perlu di buat UI nya).

    | Name      | Desc                              |
    |-----------|-----------------------------------|
    | Roasted   | Pengolahan warna dengan dibakar   |
    | Boiled    | Pengolahan warna dengan di rebus  |
    | Printed   | Pengolahan warna dengan di print  |
   

4. Color Name Method: informasi prihal identitas warna color method, 1 color method bisa memiliki banyak color name method (cukup isi data saja di database, tidak perlu di buat UI nya).
 
    | Name  | Color Method    |
    |-------|-----------------|
    | Red Classic   | Roasted |
    | Blue Marin    | Roasted |
    | Dark Morron   | Boiled  |
    | Grey Water    | Printed |

5. Sales Order: merupakan informasi pesanan dari client dengan ketentuan sebagai berikut.
    - 1 Sales Order bisa memiliki banyak style
    - Di dalam 1 style bisa memiliki banyak color method.
    - Di dalam 1 color method bisa milih lebih dari satu colorn ame method beserta qty yang dipesan.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* Vuex
* Vue 3
* Laravel 11
* MySql

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites


* composer
* npm
* mySql

### Installation / Usage

   
1. Clone the repo
   ```sh
   git clone https://github.com/irvanmuhandis/testYubiTech.git
   ```
3. Open terminal in project directory   
2. Install NPM packages
   ```sh
   npm install
   ```
3. Start database MySql
4. Migrate database
   ```sh
   php artisan migrate
   ```
5. Seeding database
   ```sh
   php artisan db:seed
   ```
6. Start laravel server
   ```sh
   php artisan serve
   ```
7. Start Vue server
   ```sh
   npm run dev
   ```
8. Open browser  http://127.0.0.1:8000.



Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>
