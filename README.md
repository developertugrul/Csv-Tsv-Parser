# Supplier Product List Processor

This project parses product lists in various formats and counts unique combinations of product attributes.

## Requirements

- PHP 7+
- Web server (e.g., Apache, Nginx)

## Installation

1. Clone this repository to your web server directory.
2. Ensure your web server is running.
3. Navigate to the project directory in your web browser.

## Usage

1. Open `index.php` in your web browser.
2. Upload a product list file (CSV, TSV, JSON, or XML).
3. The unique combinations of product attributes will be counted and saved to `output.csv`.

For command-line usage, run:

```php
php cli.php --file=path_to_input_file --unique-combinations=path_to_output_file
```


## Supported Formats

- CSV
- TSV
- JSON
- XML

New formats can be added by extending the `Parser` class.

## Notes

- Ensure the required fields 'brand_name' and 'model_name' are present in the input file.
- The output file will contain unique combinations of product attributes and their counts.
