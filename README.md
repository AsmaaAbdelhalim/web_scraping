BackEnd Task 
Task: Web Scraping and Data Extraction
Objective: Write a PHP script using Laravel and any appropriate packages like Goutte or PHP Simple HTML DOM Parser to scrape a publicly accessible website (for instance, a blog or a news site) and extract specific data.
Detailed Instructions:

1. Crawl this Website: 
https://www.kotobati.com/section/%D8%B1%D9%88%D8%A7%D9%8A%D8%A7%D8%AA.

2. Identify Data to Scrape: book title – book author – book pages count – book lang – book size – book file itself as pdf.

3. Write the Script: Write a PHP script using Laravel that visits the chosen website, navigates to the correct page(s), and extracts the chosen data. The script should be able to handle errors and exceptions, and it should not violate the terms of service of the website or any applicable laws.

4. Data Parsing: After extracting the HTML of the page, parse it using XPath or CSS selectors to retrieve the necessary data.

5. Store the Data: Create a MySQL database and define a table where the scraped data will be stored. Insert the scraped data into this table.

6. AJAX: Implement a feature where the user can initiate a new scraping operation via an AJAX request, and once the operation is completed, the data should automatically appear on the webpage without a refresh

7. You should scrape all books that existing in the above link : notice that loading books depending on scroll to the end of the page so you need to fire this event of go down page to can get more new books loading books 

Deliverables:
 • The Laravel PHP script that performs the scraping.
 • A MySQL dump of the database used to store the scraped data. 
 • Document your code and write instructions on how to run it.
