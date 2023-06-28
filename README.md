# Webchat

### Что реализовано:

- Регистрация (ui/auth)
- Локализация
- Создание:
    - Миграции
    - Модели
    - Связь "Один ко многим"
    - Формы в Bootstrap
    - POST запрос
- Дата отправки сообщения
- Dependency Injection
- Частичный Real-Time на чистом JQuery (обновление блока с сообщенями при отправлении и через промежуток времени)
- Страница пользователя (пока сырая)

### Планируется реализовать:

- Аватарка (уже в процессе)
- Ответы на сообщения
- Редактирование сообщения

## Запуск локально
Нам потребуется установленный ```SQLite``` на локальной машине\
В папке ```database``` создаем пустой файл ```data.sqlite```\
Далее применяем миграции:
```bash
php artisan migrate
```
После чего запускаем проект:
```bash
# TTY 1
php artisan serve
# TTY 2
npm run dev
```
