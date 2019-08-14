Решенная для стажёра-автоматизатора
На вход поступает 2 файла:

TestcaseStructure.json
Values.json

TestcaseStructure.json заполняется на основе данных Values.json. На выход получаем файл: StuctureWithValues.json.

Если мы не можем найти параметр с id из файла Values.json, то считаем, что такого параметра нет и значение подставлять некуда.

Если у параметра с id из Values.json, в массиве values нет объекта с id равным value, то считаем, что такого значения нет и оставляем поле value пустым.

Если входные файлы являются неконсистентными, то программа должна сформировать файл error.json с сообщением о том, что входные файлы являются некорректными. Пример error.json приложен к заданию.

Ссылка на задание 2: https://docs.google.com/spreadsheets/d/1Y4dmydl-ld9kJivsFSyU5l2kOXp4gaymNwstSoE0wMw/edit?usp=sharing
