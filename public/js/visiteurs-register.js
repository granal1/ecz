// ======================= НАСТРОЙКИ =======================
const SERVER_URL = 'https://site/api/v1/visiteurs-register'; // Сервер сбора данных
const REGISTRED_USER = 'user1@mail.local'; // Должно совпадать с почтой зарегистрированного пользователя на сервере
const API_SERVICE = 'https://api.ipgeolocation.io/ipgeo'; // Сервис определения геолокации пользователя по ip
const API_KEY = '91f92cc5d89045fea69...d8271a2cbe53f'; // API ключ
// =========================================================

/**
 * Определяет информацию об устройстве по User-Agent и другим свойствам браузера
 * @returns {Object} - информация об устройстве (ОС, браузер, тип устройства)
 */
function getDeviceInfo() {
    const ua = navigator.userAgent;
    let os = 'Unknown';
    let browser = 'Unknown';
    let deviceType = 'Desktop';

    // Определение ОС
    if (ua.indexOf('Windows NT') !== -1) os = 'Windows';
    else if (ua.indexOf('Mac OS X') !== -1) os = 'macOS';
    else if (ua.indexOf('Linux') !== -1) os = 'Linux';
    else if (ua.indexOf('Android') !== -1) os = 'Android';
    else if (ua.indexOf('iPhone') !== -1 || ua.indexOf('iPad') !== -1 || ua.indexOf('iPod') !== -1) os = 'iOS';
    else if (ua.indexOf('CrOS') !== -1) os = 'Chrome OS';

    // Определение браузера
    if (ua.indexOf('Edg/') !== -1) browser = 'Edge';
    else if (ua.indexOf('OPR/') !== -1 || ua.indexOf('Opera') !== -1) browser = 'Opera';
    else if (ua.indexOf('Chrome') !== -1 && ua.indexOf('Edg') === -1) browser = 'Chrome';
    else if (ua.indexOf('Firefox') !== -1) browser = 'Firefox';
    else if (ua.indexOf('Safari') !== -1 && ua.indexOf('Chrome') === -1) browser = 'Safari';
    else if (ua.indexOf('Trident') !== -1 || ua.indexOf('MSIE') !== -1) browser = 'Internet Explorer';

    // Определение типа устройства (мобильное/планшет/десктоп)
    const isMobile = /Mobile|Android|iPhone|iPod|BlackBerry|Windows Phone/i.test(ua);
    const isTablet = /iPad|Android(?!.*Mobile)/i.test(ua);
    if (isTablet) deviceType = 'Tablet';
    else if (isMobile) deviceType = 'Mobile';
    else deviceType = 'Desktop';

    return {
        os,
        browser,
        type: deviceType,
        userAgent: ua,
        screenResolution: `${screen.width}x${screen.height}`,
        language: navigator.language
    };
}

/**
 * Получает IP и город через бесплатный сервис ipapi.co
 * @returns {Promise<{ip: string|null, city: string|null}>}
 */
async function getIpAndCity() {
    try {
        // const response = await fetch('https://ipapi.co/json/?apiKey='); // Запасной сервис
        const response = await fetch(API_SERVICE + '?apiKey=' + API_KEY);
        if (!response.ok) throw new Error(`HTTP ${response.status}`);
        const data = await response.json();
        return {
            ip: data.ip || null,
            city: data.city || null
        };
    } catch (error) {
        console.error('Ошибка при получении геоданных:', error);
        return { ip: null, city: null };
    }
}

/**
 * Главная функция: собирает данные и отправляет их
 */
async function collectAndSend() {
    const deviceInfo = getDeviceInfo();
    const { ip, city } = await getIpAndCity();
    const url = window.location.href;
    const referrer = document.referrer || 'Нет';

    const payload = {
        user: REGISTRED_USER,
        ip: ip,
        city: city,
        device: deviceInfo,
        url: url,
        referrer: referrer,
        timestamp: new Date().toISOString()
    };

    // Отправка на сервер
    await sendToServer(payload);
}

/**
 * Отправляет собранные данные на сервер
 * @param {Object} data - объект с данными (user, site, ip, city, device, timestamp)
 */
async function sendToServer(data) {
    try {
        const response = await fetch(SERVER_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        if (!response.ok) {
            console.error(`Ошибка отправки: ${response.status}`);
        } else {
            console.log('Данные успешно отправлены');
        }
    } catch (error) {
        console.error('Сетевая ошибка при отправке:', error);
    }
}

// Запуск скрипта после полной загрузки страницы (не блокирует рендеринг)
window.addEventListener('DOMContentLoaded', collectAndSend);
