# Interest Calculator

## Descripción
Un plugin para calcular interés compuesto y almacenar los resultados en la base de datos.

## Instalación
1. Copia la carpeta `interest-calculator` a tu directorio `wp-content/plugins`.
```bash
composer install
```
2. Activa el plugin desde el panel de administración de WordPress.
3. Usa el endpoint REST API para realizar cálculos.


## Uso del Endpoint
- URL: `/wp-json/money-calcs/v1/calculate`
- Método: `POST`
- Cuerpo JSON:
  ```json
  {
    "principal": 1000,
    "rate": 0.05,
    "time": 5
  }

[![Miniatura 1](https://i.ibb.co/9yVk415/min1.png)](https://i.ibb.co/6Xrsd4x/Captura-de-pantalla-2024-11-20-a-las-6-06-40.png)
[![Miniatura 2](https://i.ibb.co/9yVk415/min1.png)](screenshots/full2.png)
[![Miniatura 3](https://i.ibb.co/9yVk415/min1.png)](screenshots/full3.png)
