<?php
// Custom Buildpack URL
putenv('BUILDPACK_URL=https://github.com/cristianobaptista/heroku-wordpress-buildpack.git');

// Database URL
putenv("DB_URL=mysql://root:password@localhost:3306/wordpress");

//define("EXEL_ENVIRONMENT", "development");

// Environment Path
putenv('PATH=/app/bin:/app/vendor/nginx/sbin:/app/vendor/php/bin:/app/vendor/php/sbin:/usr/local/bin:/usr/bin:/bin');

// Aws Access
putenv('AWS_ACCESS_KEY_ID=AKIAJB2SWMCNEMQ4RTJQ');
putenv('AWS_SECRET_ACCESS_KEY=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');

// Email Config
putenv('MANDRILL_APIKEY=gTbDKQSK5N9qRQOzg0PvnQ');
putenv('MANDRILL_USERNAME=info@ponticlaro.com');
putenv('EMAIL_FROM=email@example.com');
putenv('EMAIL_NAME=Clark Kent');
putenv('EMAIL_REPLY_TO=email@example.com');

// AWS S3 uploads plugin
putenv('PCLARO_WP_S3_BUCKET=dev-client-resources');
putenv('PCLARO_WP_S3_BUCKET_PROJECT_PATH=exel-magazine');
putenv('PCLARO_WP_S3_BUCKET_UPLOADS_PATH=media');
putenv('PCLARO_WP_S3_CDN_URLS_ENABLED=true');

// WordPress Stuff
//putenv('WP_CACHE=true');
//putenv('WP_DEBUG=true');
//putenv('DISABLE_WP_CRON=true');
//putenv('ENABLE_SYSTEM_ACCESS=true');
//putenv('FORCE_SSL_ADMIN=true');
//putenv('FORCE_SSL_LOGIN=true');

// Other configurations
//putenv('SSL_SCHEME=true');
//putenv('DOMAIN=');
