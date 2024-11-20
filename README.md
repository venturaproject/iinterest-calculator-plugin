# Interest Calculator

## Descripción
Un plugin para calcular interés compuesto y almacenar los resultados en la base de datos.

## Instalación
1. Copia la carpeta `interest-calculator` a tu directorio `wp-content/plugins`.
2. Activa el plugin desde el panel de administración de WordPress.
3. Usa el endpoint REST API para realizar cálculos.

```bash
composer install
```

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