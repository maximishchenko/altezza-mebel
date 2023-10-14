<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'POLICY');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="policy">
    <h5>1. Общие положения</h5>
        <p>
            Настоящая политика обработки персональных данных составлена в соответствии с
            требованиями Федерального закона от 27.07.2006. №152-ФЗ «О персональных
            данных» и определяет порядок обработки персональных данных и меры по
            обеспечению безопасности персональных данных, предпринимаемые Гладким Федором Федоровичем (далее – Оператор).</p>

        <p>
            1.1. Оператор ставит своей важнейшей целью и условием осуществления своей
            деятельности соблюдение прав и свобод человека и гражданина при обработке его
            персональных данных, в том числе защиты прав на неприкосновенность частной
            жизни, личную и семейную тайну.
        </p>
        <p>
            1.2. Настоящая политика Оператора в отношении обработки персональных данных
            (далее – Политика) применяется ко всей информации, которую Оператор может
            получить о посетителях веб-сайта <?= Html::a(Yii::$app->request->hostInfo, Yii::$app->request->hostInfo, []); ?>.
        </p>

        <h5>2. Основные понятия, используемые в Политике</h5>

        <p>
            2.1. Автоматизированная обработка персональных данных – обработка персональных
            данных с помощью средств вычислительной техники;
        </p>
        <p>
            2.2. Блокирование персональных данных – временное прекращение обработки
            персональных данных (за исключением случаев, если обработка необходима для
            уточнения персональных данных);
        </p>
        <p>
            2.3. Веб-сайт – совокупность графических и информационных материалов, а также
            программ для ЭВМ и баз данных, обеспечивающих их доступность в сети интернет по
            сетевому адресу <?= Html::a(Yii::$app->request->hostInfo, Yii::$app->request->hostInfo, []); ?>;
        </p>
        <p>
            2.4. Информационная система персональных данных — совокупность содержащихся в
            базах данных персональных данных, и обеспечивающих их обработку
            информационных технологий и технических средств;
        </p>
        <p>
            2.5. Обезличивание персональных данных — действия, в результате которых
            невозможно определить без использования дополнительной информации
            принадлежность персональных данных конкретному Пользователю или иному
            субъекту персональных данных;
        </p>
        <p>
            2.6. Обработка персональных данных – любое действие (операция) или совокупность
            действий (операций), совершаемых с использованием средств автоматизации или без
            использования таких средств с персональными данными, включая сбор, запись,
            систематизацию, накопление, хранение, уточнение (обновление, изменение),
            извлечение, использование, передачу (распространение, предоставление, доступ),
            обезличивание, блокирование, удаление, уничтожение персональных данных;
        </p>
        <p>
            2.7. Оператор – государственный орган, муниципальный орган, юридическое или
            физическое лицо, самостоятельно или совместно с другими лицами организующие и
            (или) осуществляющие обработку персональных данных, а также определяющие цели
            обработки персональных данных, состав персональных данных, подлежащих
            обработке, действия (операции), совершаемые с персональными данными;
        </p>
        <p>
            2.8. Персональные данные – любая информация, относящаяся прямо или косвенно к
            определенному или определяемому Пользователю веб-сайта <?= Html::a(Yii::$app->request->hostInfo, Yii::$app->request->hostInfo, []); ?>;
        </p>
        <p>
            2.9. Пользователь – любой посетитель веб-сайта <?= Html::a(Yii::$app->request->hostInfo, Yii::$app->request->hostInfo, []); ?>;
        </p>
        <p>
            2.10. Предоставление персональных данных – действия, направленные на раскрытие
            персональных данных определенному лицу или определенному кругу лиц;
        </p>
        <p>
            2.11. Распространение персональных данных – любые действия, направленные на
            раскрытие персональных данных неопределенному кругу лиц (передача персональных
            данных) или на ознакомление с персональными данными неограниченного круга лиц, в
            том числе обнародование персональных данных в средствах массовой информации,
            размещение в информационно-телекоммуникационных сетях или предоставление
            доступа к персональным данным каким-либо иным способом;
        </p>
        <p>
            2.12. Трансграничная передача персональных данных – передача персональных
            данных на территорию иностранного государства органу власти иностранного
            государства, иностранному физическому или иностранному юридическому лицу;
        </p>
        <p>
            2.13. Уничтожение персональных данных – любые действия, в результате которых
            персональные данные уничтожаются безвозвратно с невозможностью дальнейшего
            восстановления содержания персональных данных в информационной системе
            персональных данных и (или) уничтожаются материальные носители персональных
            данных.
        </p>

        <h5>3. Оператор может обрабатывать следующие персональные данные Пользователя</h5>
        <p>
            3.1. Фамилия, имя, отчество;
        </p>
        <p>
            3.2. Номера телефонов;
        </p>
        <p>
            3.3. Также на сайте происходит сбор и обработка обезличенных данных о посетителях
            (в т.ч. файлов «cookie») с помощью сервисов интернет-статистики (Яндекс Метрика и
            Гугл Аналитика и других).
        </p>
        <p>
            3.4. Вышеперечисленные данные далее по тексту Политики объединены общим
            понятием Персональные данные.
        </p>
        <p>
        <h5>4. Цели обработки персональных данных</h5>
        </p>
        <p>
            4.1. Цель обработки персональных данных Пользователя — Информирование
            Пользователя посредством отправки сообщений и информировании посредством
            телефонного звонка.
        </p>
        <p>
            4.2. Также Оператор имеет право направлять Пользователю уведомления о новых
            продуктах и услугах, специальных предложениях и различных событиях. Пользователь
            всегда может отказаться от получения информационных сообщений, направив
            Оператору письмо на адрес электронной почты <?= Html::mailto(Yii::$app->configManager->getItemValue('contactEmail'), Yii::$app->configManager->getItemValue('contactEmail')); ?> с пометкой
            «Отказ от уведомлений о новых продуктах и услугах и специальных предложениях».
        </p>
        <p>
            4.3. Обезличенные данные Пользователей, собираемые с помощью сервисов
            интернет-статистики, служат для сбора информации о действиях Пользователей на
            сайте, улучшения качества сайта и его содержания.
        </p>
        <h5>5. Правовые основания обработки персональных данных</h5>
        <p>
            5.1. Оператор обрабатывает персональные данные Пользователя только в случае их
            заполнения и/или отправки Пользователем самостоятельно через специальные
            формы, расположенные на сайте <?= Html::a(Yii::$app->request->hostInfo, Yii::$app->request->hostInfo, []); ?>. Заполняя соответствующие
            формы и/или отправляя свои персональные данные Оператору, Пользователь
            выражает свое согласие с данной Политикой.</p>
        <p>
            5.2. Оператор обрабатывает обезличенные данные о Пользователе в случае, если это
            разрешено в настройках браузера Пользователя (включено сохранение файлов
            «cookie» и использование технологии JavaScript).</p>

        <h5>6. Порядок сбора, хранения, передачи и других видов обработки персональных данных
            Безопасность персональных данных, которые обрабатываются Оператором,
            обеспечивается путем реализации правовых, организационных и технических мер,
            необходимых для выполнения в полном объеме требований действующего
            законодательства в области защиты персональных данных.</h5>
        <p>
            6.1. Оператор обеспечивает сохранность персональных данных и принимает все
            возможные меры, исключающие доступ к персональным данным неуполномоченных
            лиц.</p>
        <p>
            6.2. Персональные данные Пользователя никогда, ни при каких условиях не будут
            переданы третьим лицам, за исключением случаев, связанных с исполнением
            действующего законодательства.</p>
        <p>
            6.3. В случае выявления неточностей в персональных данных, Пользователь может
            актуализировать их самостоятельно, путем направления Оператору уведомление на
            адрес электронной почты Оператора <?= Html::mailto(Yii::$app->configManager->getItemValue('contactEmail'), Yii::$app->configManager->getItemValue('contactEmail')); ?> с пометкой «Актуализация
            персональных данных».</p>
        <p>
            6.4. Срок обработки персональных данных является неограниченным. Пользователь
            может в любой момент отозвать свое согласие на обработку персональных данных,
            направив Оператору уведомление посредством электронной почты на электронный
            адрес Оператора <?= Html::mailto(Yii::$app->configManager->getItemValue('contactEmail'), Yii::$app->configManager->getItemValue('contactEmail')); ?> с пометкой «Отзыв согласия на обработку
            персональных данных».
        </p>
        <h5>7. Трансграничная передача персональных данных</h5>
        <p>
            7.1. Оператор до начала осуществления трансграничной передачи персональных
            данных обязан убедиться в том, что иностранным государством, на территорию
            которого предполагается осуществлять передачу персональных данных,
            обеспечивается надежная защита прав субъектов персональных данных.</p>
        <p>
            7.2. Трансграничная передача персональных данных на территории иностранных
            государств, не отвечающих вышеуказанным требованиям, может осуществляться
            только в случае наличия согласия в письменной форме субъекта персональных
            данных на трансграничную передачу его персональных данных и/или исполнения
            договора, стороной которого является субъект персональных данных.</p>

        <h5>8. Заключительные положения</h5>
        <p>
            8.1. Пользователь может получить любые разъяснения по интересующим вопросам,
            касающимся обработки его персональных данных, обратившись к Оператору с
            помощью электронной почты <?= Html::mailto(Yii::$app->configManager->getItemValue('contactEmail'), Yii::$app->configManager->getItemValue('contactEmail')); ?>.</p>
        <p>
            8.2. В данном документе будут отражены любые изменения политики обработки
            персональных данных Оператором. Политика действует бессрочно до замены ее
            новой версией.</p>
        <p>
            8.3. Актуальная версия Политики в свободном доступе расположена в сети Интернет
            по адресу <?= Html::a(Url::toRoute('/policy', true), Url::toRoute('/policy', true), ['target' => '_blank']); ?>.</p>.</p>

</div>