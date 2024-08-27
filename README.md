## README.md: Count Categories Module

### Overview

This ProcessWire module is designed to update the count of products within specified categories. It iterates through level 2 and level 3 pages, calculating the number of products that belong to each category based on the `pro_ausstellung` field.

### Installation

1. **Download:** Download the module's ZIP file.
2. **Extract:** Extract the contents of the ZIP file to your ProcessWire installation's `site/modules` directory.
3. **Activate:** Enable the module in the ProcessWire backend under "Modules".

### Usage

1. **Access the Module Page:** Navigate to the module's page in the ProcessWire backend (typically under "Setup").
2. **Execute the Module:** Click the "Execute" button to trigger the update process.

### Functionality

The module performs the following tasks:

* **Iterates through categories:** Traverses level 2 and level 3 pages within the specified categories.
* **Counts products:** Calculates the number of products associated with each category based on the `pro_ausstellung` field.
* **Updates category fields:** Saves the calculated counts in the `counter_topangebote` and `counter_ausstellung` fields of the corresponding category pages.

### Configuration

* **Category IDs:** Ensure that the category IDs (1050 and 1051) in the code match the actual IDs of the level 2 pages you want to update.
* **Field Names:** Verify that the field names `pro_kategorie_parent`, `pro_raeume_parent`, `pro_ausstellung`, `counter_topangebote`, and `counter_ausstellung` are correct and match the fields in your ProcessWire setup.

### Limitations

* **Category Structure:** The module assumes a specific category structure with level 2 and level 3 pages. Adjust the code if your structure differs.
* **Product Field:** The module relies on the `pro_ausstellung` field to determine product visibility. Modify the code if you use a different field or criteria.

### Additional Notes

* **Superuser Access:** The module requires superuser privileges to execute.
* **Error Handling:** Consider adding error handling to catch potential exceptions during the update process.

**By following these guidelines, you can effectively use the Count Categories module to update product counts within your ProcessWire categories.**
