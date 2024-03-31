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

## Known: 
ABCD company wants to create an application that has the ability to record orders from clients with the following specifications.

![WhatsApp Image 2023-12-22 at 15 36 50](https://github.com/YubiRepo/Backend-Test-Dev/assets/62506582/d2b1b30d-04b0-41e4-831f-6d81e618afda)

1. Data Style: information about the product (just fill in the data in the database, no need to create the UI).

    | Name | Desc |
      |----------------|---------------------------|
      | Hair Punk | Contemporary Week Style |
      | Yellow Rainbow | Week Style Kidz Age Now |
      | Relic Style | Week Style Classic |

3. Color Method: color method information (just fill in the data in the database, no need to create the UI).

    | Name | Desc |
    |-----------|-----------------------------------|
    | Roasted | Color processing by burning |
    | Boiled | Color processing by boiling |
    | Printed | Color processing by printing |
   
4. Color Name Method: information about color identity color method, 1 color method can have many color name methods (just fill in the data in the database, no need to create the UI).
 
    | Name | Color Method |
    |-------|-----------------|
    | Red Classic | Roasted |
    | Blue Marin | Roasted |
    | Dark Morron | Boiled |
    | Grey Water | Printed |

5. Sales Order: is order information from the client with the following conditions.
    - 1 Sales Order can have many styles
    - Inside 1 style can have many color methods.
    - In 1 color method can choose more than one color ame method along with the qty ordered.


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


* Composer v2.5.5
* Npm v9.3.1
* MySql v8.2.0

### Installation / Usage

   
1. Clone the repo
   ```sh
   git clone https://github.com/irvanmuhandis/testYubiTech.git
   ```
3. Open terminal in project directory
4. Genereate APP_KEY in env using command
   ```sh
   php artisan key:generate
   ```   
5. Install NPM packages using command
   ```sh
   npm install
   ```
6. Start database MySql service
7. Migrate database
   ```sh
   php artisan migrate
   ```
8. Seeding database
   ```sh
   php artisan db:seed
   ```
9.  Start laravel server
    ```sh
    php artisan serve
    ```
10. Start Vue server
    ```sh
    npm run dev
    ```
11. Open browser  http://127.0.0.1:8000.



<p align="right">(<a href="#readme-top">back to top</a>)</p>
