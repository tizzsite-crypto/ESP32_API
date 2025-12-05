# Imagen base PHP con servidor web incorporado
FROM php:8.2-cli

# Copiar los archivos del repositorio
WORKDIR /app
COPY . /app

# Exponer puerto
EXPOSE 10000

# Comando para iniciar servidor PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
