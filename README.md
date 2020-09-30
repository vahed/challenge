## Orders CSV Export - PHP Coding Challenge

Coding challenge is to create a CSV export system that gathers data from multiple sources.
1. Can use any framework, and any composer packages you think will be useful.
2. Must implement an interface to allow data from multiple sources to be used without modifying
the business logic.
3. Web page with options for date range, and column to order by (must allow ordering by any
column in the data) and button to download the data.
4. Web page styling is optional.

### Data Sources
Import from 4 data sources provided:
* CSV x2 (Each CSV has its columns formatted slightly differently – you could abstract the common
components)
* JSON
* XML
Each source will provide all the data you need but in different formats.
The files can be stored anywhere, and the paths can be hardcoded in your script.
### Exported CSV
All data must be formatted consistently regardless of the original format. The outputted CSV must
include:
* Order Date
* Name
* Sub Total
* VAT Value
* VAT Percentage
* Total
