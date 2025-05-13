-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 11 2025 г., 17:00
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `medical_cooperative`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blood_type`
--

CREATE TABLE `blood_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `blood_type`
--

INSERT INTO `blood_type` (`id`, `type`) VALUES
(1, 'O(I) Rh+ — первая положительная'),
(2, 'O(I) Rh− — первая отрицательная'),
(3, 'A(II) Rh+ — вторая положительная'),
(4, 'A(II) Rh− — вторая отрицательная'),
(5, 'B (III) Rh+ — третья положительная'),
(6, 'B (III) Rh− — третья отрицательная'),
(7, 'AB (IV) Rh+ — четвёртая положительная'),
(8, 'AB (IV) Rh− — четвёртая отрицательная');

-- --------------------------------------------------------

--
-- Структура таблицы `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `string` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `string`) VALUES
(1, 'ОРВИ'),
(2, 'Пневмония'),
(3, 'Гипертония'),
(4, 'Гастрит'),
(5, 'Сахарный диабет 2 типа');

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `patronymic` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `number_phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `specialization` int(11) DEFAULT NULL,
  `post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`id`, `last_name`, `first_name`, `patronymic`, `date_of_birth`, `number_phone`, `email`, `specialization`, `post`) VALUES
(1, 'Калин', 'Артём', 'Семёнович', '1975-02-04', '+7 (465) 987-34-55', 'artkalin123@mail.ru', 1, 1),
(2, 'Сорокина', 'Евгения', 'Валерьевна', '1982-05-19', '+7 (913) 222-11-22', 'sorokina.evgenia@mail.ru', 2, 2),
(3, 'Дьяков', 'Павел', 'Ильич', '1978-08-30', '+7 (901) 345-67-89', 'd.pavel78@mail.ru', 3, 3),
(4, 'Рябцева', 'Марина', 'Григорьевна', '1986-11-11', '+7 (902) 456-78-90', 'ryabtseva.marina@gmail.com', 4, 4),
(5, 'Андреев', 'Михаил', 'Олегович', '1990-01-17', '+7 (900) 123-45-67', 'andreev.mikhail@yandex.ru', 5, 5),
(6, 'Захарова', 'Ольга', 'Петровна', '1984-03-08', '+7 (933) 111-22-33', 'z.olg@mail.ru', 6, 1),
(7, 'Громов', 'Сергей', 'Львович', '1976-07-22', '+7 (921) 777-88-99', 'gromov.sergey@mail.ru', 7, 2),
(8, 'Мельникова', 'Инна', 'Валентиновна', '1988-09-15', '+7 (914) 333-44-55', 'inna.melnikova@mail.ru', 8, 3),
(9, 'Титов', 'Александр', 'Федорович', '1981-04-05', '+7 (945) 888-99-00', 'titov.alex@mail.ru', 9, 4),
(10, 'Беляева', 'Наталья', 'Владимировна', '1993-12-28', '+7 (966) 555-66-77', 'belyaeva.natasha@mail.ru', 10, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`id`, `gen`) VALUES
(1, 'Женский'),
(2, 'Мужской');

-- --------------------------------------------------------

--
-- Структура таблицы `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `application` text DEFAULT NULL,
  `action` text DEFAULT NULL,
  `effect` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `application`, `action`, `effect`) VALUES
(1, 'Парацетамол', 'Жаропонижающее, обезболивающее', 'Блокирует синтез простагландинов в ЦНС', 'Снижает температуру и устраняет боль'),
(2, 'Ибупрофен', 'Обезболивающее, противовоспалительное', 'Ингибирует ЦОГ-1 и ЦОГ-2', 'Снижает воспаление, боль и температуру'),
(3, 'Цетиризин', 'Антигистаминное средство', 'Блокирует H1-гистаминовые рецепторы', 'Устраняет аллергические симптомы'),
(4, 'Амоксициллин', 'Антибиотик широкого спектра', 'Нарушает синтез бактериальной стенки', 'Уничтожает бактерии'),
(5, 'Но-шпа', 'Спазмолитик', 'Ингибирует фосфодиэстеразу', 'Снимает спазмы гладкой мускулатуры'),
(6, 'Лоперамид', 'Противодиарейное средство', 'Снижает моторику кишечника', 'Уменьшает частоту стула'),
(7, 'Омепразол', 'Противоязвенное средство', 'Ингибирует протонную помпу', 'Снижает секрецию желудочной кислоты'),
(8, 'Анальгин', 'Обезболивающее и жаропонижающее', 'Угнетает ЦОГ в ЦНС и ПНС', 'Устраняет боль и снижает температуру'),
(9, 'Флуконазол', 'Противогрибковое средство', 'Ингибирует синтез эргостерола', 'Уничтожает грибки рода Candida'),
(10, 'Аскорбиновая кислота', 'Витамин С', 'Участвует в окислительно-восстановительных реакциях', 'Повышает иммунитет и укрепляет сосуды');

-- --------------------------------------------------------

--
-- Структура таблицы `name_of_the_medicine`
--

CREATE TABLE `name_of_the_medicine` (
  `id` int(11) NOT NULL,
  `visit` int(11) DEFAULT NULL,
  `medicine` int(11) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `duration_of_admission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `name_of_the_medicine`
--

INSERT INTO `name_of_the_medicine` (`id`, `visit`, `medicine`, `dosage`, `duration_of_admission`) VALUES
(1, 1, 1, '500 мг 2 раза в день', '5 дней'),
(2, 2, 2, '1 г 3 раза в день', '7 дней'),
(3, 3, 3, '250 мг утром и вечером', '3 дня'),
(4, 4, 4, '100 мг 1 раз в день', '10 дней'),
(5, 5, 5, '750 мг каждые 8 часов', '4 дня'),
(6, 6, 6, '500 мг утром, 1 г вечером', '6 дней'),
(7, 7, 7, '1 г через каждые 6 часов', '2 дня'),
(8, 8, 8, '200 мг до еды', '14 дней'),
(9, 9, 9, '600 мг 3 раза в день', '5 дней'),
(10, 10, 10, '400 мг 2 раза в сутки', '7 дней'),
(11, 11, 1, '1 г 2 раза в день после еды', '3 дня'),
(12, 12, 2, '250 мг каждые 12 часов', '6 дней'),
(13, 13, 3, '500 мг 3 раза в день', '9 дней'),
(14, 14, 4, '1 капсула 2 раза в день', '5 дней'),
(15, 15, 5, '2 таблетки перед сном', '1 день'),
(16, 16, 6, '0.5 г 1 раз в день', '8 дней'),
(17, 17, 7, '1 г утром, 500 мг вечером', '7 дней'),
(18, 18, 8, '3 таблетки в сутки', '4 дня'),
(19, 19, 9, '500 мг каждые 4 часа', '2 дня'),
(20, 20, 10, '1 таблетка в день', '10 дней'),
(21, 21, 1, '600 мг после еды', '3 дня'),
(22, 22, 2, '0.25 г до еды', '5 дней'),
(23, 23, 3, '1 таблетка каждые 6 часов', '6 дней'),
(24, 24, 4, '750 мг утром и вечером', '12 дней'),
(25, 25, 5, '100 мг перед сном', '14 дней');

-- --------------------------------------------------------

--
-- Структура таблицы `passport`
--

CREATE TABLE `passport` (
  `id` int(11) NOT NULL,
  `series` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `issued_by_whom` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `passport`
--

INSERT INTO `passport` (`id`, `series`, `number`, `issued_by_whom`) VALUES
(1, 1104, 324569, 'ОТДЕЛОМ ВНУТРЕННИХ ДЕЛ ОКТЯБРЬСКОГО РАЙОНА ГОРОДА БАРНАУЛА'),
(2, 1104, 324569, 'ОТДЕЛ ВНУТРЕННИХ ДЕЛ ОКТЯБРЬСКОГО РАЙОНА ГОРОДА БАРНАУЛА'),
(3, 1105, 324570, 'ОТДЕЛ ВНУТРЕННИХ ДЕЛ ИНДУСТРИАЛЬНОГО РАЙОНА Г. БАРНАУЛА'),
(4, 1106, 324571, 'ОТДЕЛ ВНУТРЕННИХ ДЕЛ ЦЕНТРАЛЬНОГО РАЙОНА Г. БАРНАУЛА'),
(5, 1107, 324572, 'ОТДЕЛ УФМС ПО ЖЕЛЕЗНОДОРОЖНОМУ РАЙОНУ Г. БАРНАУЛА'),
(6, 1108, 324573, 'ОТДЕЛ УФМС ПО ЛЕНИНСКОМУ РАЙОНУ Г. БАРНАУЛА'),
(7, 1109, 324574, 'ОТДЕЛ УФМС ПО РАЙОНУ НОВОСИЛЬСКИЙ Г. БАРНАУЛА'),
(8, 1110, 324575, 'УФМС РОССИИ ПО АЛТАЙСКОМУ КРАЮ В Г. БАРНАУЛЕ'),
(9, 1111, 324576, 'ОТДЕЛ ВНУТРЕННИХ ДЕЛ ПО СОВЕТСКОМУ РАЙОНУ Г. БАРНАУЛА'),
(10, 1112, 324577, 'ПАСПОРТНЫЙ СТОЛ ОКТЯБРЬСКОГО РАЙОНА Г. БАРНАУЛА'),
(11, 1201, 458732, 'ОТДЕЛ УФМС РОССИИ ПО Г. БИЙСКУ'),
(12, 1202, 458733, 'ОТДЕЛ УФМС РОССИИ ПО Г. РУБЦОВСКУ'),
(13, 1203, 458734, 'ОТДЕЛ УФМС РОССИИ ПО Г. СЛАВГОРОДУ'),
(14, 1204, 458735, 'ОТДЕЛ УФМС ПО ЗОНАЛЬНОМУ РАЙОНУ АЛТАЙСКОГО КРАЯ'),
(15, 1301, 567890, 'ОТДЕЛ УФМС РОССИИ ПО КЕМЕРОВСКОЙ ОБЛАСТИ В Г. КЕМЕРОВО'),
(16, 1302, 567891, 'ОТДЕЛ УФМС РОССИИ ПО НОВОСИБИРСКОЙ ОБЛАСТИ В Г. НОВОСИБИРСКЕ');

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `patronymic` varchar(20) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `data_of_birth` date DEFAULT NULL,
  `reg_address` varchar(50) DEFAULT NULL,
  `resid_address` varchar(50) DEFAULT NULL,
  `passport` int(11) DEFAULT NULL,
  `insurance_policy` varchar(50) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `blood_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id`, `last_name`, `first_name`, `patronymic`, `gender`, `data_of_birth`, `reg_address`, `resid_address`, `passport`, `insurance_policy`, `organization`, `phone_number`, `email`, `blood_type`) VALUES
(1, 'Иванов', 'Петр', 'Васильевич', 1, '1967-02-07', 'г. Барнаул, ул. Ленина 86', 'г. Барнаул, ул. Ленина 86', 2, '123-213-234 78', 'ООО Шиномонтаж', '+7 (945) 465-12-11', 'ivanovpetr355@mail.ru', 2),
(2, 'Смирнова', 'Елена', 'Николаевна', 2, '1985-03-14', 'г. Барнаул, ул. Молодежная 14', 'г. Барнаул, ул. Молодежная 14', 3, '321-456-789 01', 'АО БарнаулМех', '+7 (913) 123-45-67', 'smirnova.elena@mail.ru', 3),
(3, 'Кузнецов', 'Игорь', 'Алексеевич', 1, '1990-08-21', 'г. Барнаул, ул. Советская 9', 'г. Барнаул, ул. Советская 9', 4, '111-222-333 44', 'ИП \"Кузнецов И.А.\"', '+7 (905) 332-11-22', 'kuznetsov.igor@gmail.com', 1),
(4, 'Попова', 'Мария', 'Андреевна', 2, '1978-12-03', 'г. Барнаул, ул. Георгиева 8', 'г. Барнаул, ул. Георгиева 8', 5, '987-654-321 00', 'МУП Водоканал', '+7 (923) 444-55-66', 'm.popova@yandex.ru', 4),
(5, 'Соколов', 'Дмитрий', 'Сергеевич', 1, '1982-07-17', 'г. Барнаул, ул. Первомайская 10', 'г. Барнаул, ул. Первомайская 10', 6, '112-233-344 55', 'ЗАО СтройТех', '+7 (913) 876-54-32', 'sokolov_d@mail.ru', 2),
(6, 'Новикова', 'Татьяна', 'Викторовна', 2, '1995-09-26', 'г. Барнаул, ул. Центральная 22', 'г. Барнаул, ул. Центральная 22', 7, '654-321-987 77', 'ООО Молоко', '+7 (901) 555-11-22', 'novikova.tanya@gmail.com', 1),
(7, 'Федорова', 'Анастасия', 'Игоревна', 2, '2000-04-12', 'г. Барнаул, ул. Парковая 33', 'г. Барнаул, ул. Парковая 33', 8, '321-888-999 00', 'ИП \"Федорова А.И.\"', '+7 (904) 321-77-88', 'fedorova.a@gmail.com', 3),
(8, 'Васильев', 'Алексей', 'Геннадьевич', 1, '1969-01-05', 'г. Барнаул, ул. Победы 1', 'г. Барнаул, ул. Победы 1', 9, '223-344-556 33', 'ООО ТехИнвест', '+7 (960) 444-11-00', 'vasiliev.a@mail.ru', 1),
(9, 'Орлова', 'Ирина', 'Валерьевна', 2, '1988-11-23', 'г. Барнаул, ул. Калинина 27', 'г. Барнаул, ул. Калинина 27', 10, '998-777-111 44', 'ГБУЗ Краевая больница', '+7 (962) 888-77-66', 'orlova.i@rambler.ru', 4),
(10, 'Григорьев', 'Никита', 'Павлович', 1, '1992-02-15', 'г. Барнаул, ул. Энтузиастов 5', 'г. Барнаул, ул. Энтузиастов 5', 11, '667-899-554 10', 'ЗАО БарнаулСтрой', '+7 (913) 998-45-23', 'grigoryev_n@mail.ru', 2),
(11, 'Мельникова', 'Ольга', 'Алексеевна', 2, '2021-10-04', 'г. Барнаул, ул. Щетинкина 18', 'г. Барнаул, ул. Щетинкина 18', 12, '113-224-335 66', 'ФГУП Почта России', '+7 (914) 765-43-21', 'melnikova.olga@gmail.com', 3),
(12, 'Зайцев', 'Роман', 'Михайлович', 1, '1986-05-11', 'г. Барнаул, ул. Гоголя 6', 'г. Барнаул, ул. Гоголя 6', 13, '456-789-123 99', 'ООО АлтайЭлектро', '+7 (915) 666-00-22', 'zaytsev.roman@yandex.ru', 2),
(13, 'Лебедева', 'Наталья', 'Евгеньевна', 2, '1997-07-19', 'г. Барнаул, ул. Лазурная 15', 'г. Барнаул, ул. Лазурная 15', 14, '908-807-607 50', 'ООО ТурСервис', '+7 (916) 444-99-88', 'lebedeva.natasha@mail.ru', 1),
(14, 'Николаев', 'Виктор', 'Анатольевич', 1, '1983-12-25', 'г. Барнаул, ул. Революции 55', 'г. Барнаул, ул. Революции 55', 15, '743-322-111 18', 'АО БарнаулГаз', '+7 (917) 333-11-77', 'nikolaev.viktor@mail.ru', 4),
(15, 'Петрова', 'Светлана', 'Дмитриевна', 2, '1991-03-07', 'г. Барнаул, ул. Титова 88', 'г. Барнаул, ул. Титова 88', 16, '331-776-880 14', 'ИП \"Петрова С.Д.\"', '+7 (919) 222-00-55', 'sv.petrova@mail.ru', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `string` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `string`) VALUES
(1, 'Старший врач'),
(2, 'Врач-специалист'),
(3, 'Участковый врач'),
(4, 'Заведующий отделением'),
(5, 'Интерн'),
(9, 'Старший врач');

-- --------------------------------------------------------

--
-- Структура таблицы `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `name_prescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `prescription`
--

INSERT INTO `prescription` (`id`, `name_prescription`) VALUES
(1, 'Постельный режим, обильное тёплое питьё, приём жаропонижающих средств (парацетамол или ибупрофен) и противовирусных препаратов в течение 5–7 дней'),
(2, 'Антибактериальная терапия (по назначению врача), ингаляции, дыхательная гимнастика, обильное питьё, контроль температуры и состояния дыхания'),
(3, 'Регулярный контроль артериального давления, приём гипотензивных препаратов, ограничение соли и жирной пищи, умеренная физическая активность, отказ от курения и алкоголя'),
(4, 'Дробное питание 5–6 раз в день, исключение острого, жареного и кислого, приём антацидов и ингибиторов протонной помпы, отказ от курения и алкоголя'),
(5, 'Диета с ограничением легкоусвояемых углеводов, контроль уровня глюкозы в крови, приём сахароснижающих препаратов или инсулина, регулярные физические нагрузки');

-- --------------------------------------------------------

--
-- Структура таблицы `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `string` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `specialization`
--

INSERT INTO `specialization` (`id`, `string`) VALUES
(1, 'Травматолог'),
(2, 'Кардиолог'),
(3, 'Невролог'),
(4, 'Хирург'),
(5, 'Педиатр'),
(6, 'Терапевт'),
(7, 'Офтальмолог'),
(8, 'Дерматолог'),
(9, 'Психиатр'),
(10, 'Стоматолог');

-- --------------------------------------------------------

--
-- Структура таблицы `symptoms_patients`
--

CREATE TABLE `symptoms_patients` (
  `id` int(11) NOT NULL,
  `symptom` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `symptoms_patients`
--

INSERT INTO `symptoms_patients` (`id`, `symptom`) VALUES
(1, 'Повышенная температура тела до 38–39°C с ознобом и слабостью'),
(2, 'Першение и боль в горле при глотании'),
(3, 'Заложенность носа и обильные водянистые выделения'),
(4, 'Одышка при физической нагрузке и в состоянии покоя'),
(5, 'Кашель с мокротой, иногда с гнойным или кровяным отделяемым'),
(6, 'Боль в грудной клетке, усиливающаяся при вдохе и кашле'),
(7, 'Периодическое повышение артериального давления выше 140/90'),
(8, 'Головная боль в области затылка, особенно по утрам'),
(9, 'Шум в ушах и мелькание «мушек» перед глазами'),
(10, 'Жгучая боль в верхней части живота после приёма пищи'),
(11, 'Тошнота и отрыжка с кислым привкусом'),
(12, 'Изжога, усиливающаяся в положении лёжа или после еды'),
(13, 'Сухость во рту и постоянное чувство жажды'),
(14, 'Частое и обильное мочеиспускание, особенно ночью'),
(15, 'Сильная усталость, снижение концентрации и работоспособности');

-- --------------------------------------------------------

--
-- Структура таблицы `visit`
--

CREATE TABLE `visit` (
  `id` int(11) NOT NULL,
  `patient` int(11) DEFAULT NULL,
  `doctor` int(11) DEFAULT NULL,
  `date_visit` datetime DEFAULT NULL,
  `office_in_hospital` varchar(10) DEFAULT NULL,
  `symptoms` int(11) DEFAULT NULL,
  `diagnosis` int(11) DEFAULT NULL,
  `prescription` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `visit`
--

INSERT INTO `visit` (`id`, `patient`, `doctor`, `date_visit`, `office_in_hospital`, `symptoms`, `diagnosis`, `prescription`) VALUES
(1, 1, 1, '2025-04-02 12:15:00', '105', 1, 1, 1),
(2, 1, 1, '2025-04-05 09:00:00', '101', 1, 1, 1),
(3, 2, 2, '2025-04-08 09:30:00', '102', 2, 1, 1),
(4, 3, 3, '2025-02-09 10:00:00', '103', 3, 1, 1),
(5, 4, 2, '2025-04-09 10:30:00', NULL, 4, 2, 2),
(6, 5, 5, '2025-02-11 11:00:00', '105', 5, 2, 2),
(7, 6, 6, '2025-02-12 11:30:00', '106', 6, 2, 2),
(8, 7, 7, '2025-02-13 12:00:00', '107', 7, 3, 3),
(9, 8, 8, '2025-02-14 12:30:00', '108', 8, 3, 3),
(10, 9, 9, '2025-02-15 13:00:00', '109', 9, 3, 3),
(11, 10, 10, '2025-02-16 13:30:00', NULL, 10, 4, 4),
(12, 11, 1, '2025-02-17 14:00:00', '101', 11, 4, 4),
(13, 12, 2, '2025-02-18 14:30:00', '102', 12, 4, 4),
(14, 13, 3, '2025-02-19 15:00:00', '103', 13, 5, 5),
(15, 14, 4, '2025-02-20 15:30:00', '104', 14, 5, 5),
(16, 15, 5, '2025-04-02 16:00:00', NULL, 15, 5, 5),
(17, 1, 6, '2025-04-19 09:00:00', '106', 2, 1, 1),
(18, 2, 7, '2025-04-02 09:30:00', '107', 3, 1, 1),
(19, 3, 8, '2025-03-03 10:00:00', '108', 1, 1, 1),
(20, 4, 9, '2025-04-04 10:30:00', '109', 4, 2, 2),
(21, 5, 10, '2025-03-05 11:00:00', '110', 5, 2, 2),
(22, 6, 1, '2025-03-06 11:30:00', '101', 6, 2, 2),
(23, 7, 2, '2025-03-07 12:00:00', NULL, 7, 3, 3),
(24, 8, 3, '2025-03-08 12:30:00', '103', 8, 3, 3),
(25, 9, 4, '2025-03-09 13:00:00', '104', 9, 3, 3),
(26, 10, 5, '2025-03-10 13:30:00', '105', 10, 4, 4),
(27, 11, 6, '2025-03-11 14:00:00', '106', 11, 4, 4),
(28, 12, 7, '2025-03-12 14:30:00', '107', 12, 4, 4),
(29, 13, 8, '2025-03-13 15:00:00', '108', 13, 5, 5),
(30, 14, 9, '2025-03-14 15:30:00', '109', 14, 5, 5),
(31, 15, 10, '2025-04-06 16:00:00', '110', 15, 5, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blood_type`
--

ALTER TABLE `blood_type` 
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialization` (`specialization`,`post`),
  ADD KEY `post` (`post`);
  ON DELETE SET NULL;

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender` 
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`id`);
--
-- Индексы таблицы `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);
  ON DELETE SET NULL;

--
-- Индексы таблицы `name_of_the_medicine`
--
ALTER TABLE `name_of_the_medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visit` (`visit`,`medicine`),
  ADD KEY `medicine` (`medicine`);
  ON DELETE SET NULL;

--
-- Индексы таблицы `passport`
--
ALTER TABLE `passport`
  ADD PRIMARY KEY (`id`);
  ON DELETE SET NULL;

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`,`reg_address`,`passport`,`blood_type`),
  ADD KEY `passport` (`passport`),
  ADD KEY `blood_type` (`blood_type`);
  ON DELETE SET NULL;

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `symptoms_patients`
--
ALTER TABLE `symptoms_patients`
  ADD PRIMARY KEY (`id`);
  ON DELETE SET NULL;

--
-- Индексы таблицы `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `symptoms` (`symptoms`,`diagnosis`,`prescription`),
  ADD KEY `patient` (`patient`),
  ADD KEY `doctor` (`doctor`),
  ADD KEY `diagnosis` (`diagnosis`),
  ADD KEY `location` (`office_in_hospital`),
  ADD KEY `prescription` (`prescription`);
  ON DELETE SET NULL;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blood_type`
--
ALTER TABLE `blood_type` 
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `name_of_the_medicine`
--
ALTER TABLE `name_of_the_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `passport`
--
ALTER TABLE `passport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `symptoms_patients`
--
ALTER TABLE `symptoms_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`specialization`) REFERENCES `specialization` (`id`),
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`post`) REFERENCES `post` (`id`);

--
-- Ограничения внешнего ключа таблицы `name_of_the_medicine`
--
ALTER TABLE `name_of_the_medicine`
  ADD CONSTRAINT `name_of_the_medicine_ibfk_1` FOREIGN KEY (`visit`) REFERENCES `visit` (`id`),
  ADD CONSTRAINT `name_of_the_medicine_ibfk_2` FOREIGN KEY (`medicine`) REFERENCES `medicine` (`id`);

--
-- Ограничения внешнего ключа таблицы `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`passport`) REFERENCES `passport` (`id`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`blood_type`) REFERENCES `blood_type` (`id`);

--
-- Ограничения внешнего ключа таблицы `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`patient`) REFERENCES `patient` (`id`),
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`doctor`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `visit_ibfk_3` FOREIGN KEY (`diagnosis`) REFERENCES `diagnosis` (`id`),
  ADD CONSTRAINT `visit_ibfk_5` FOREIGN KEY (`symptoms`) REFERENCES `symptoms_patients` (`id`),
  ADD CONSTRAINT `visit_ibfk_6` FOREIGN KEY (`prescription`) REFERENCES `prescription` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;