import './bootstrap';

import Alpine from 'alpinejs';

import focus from '@alpinejs/focus';
import mask from '@alpinejs/mask';
import AlpineFloatingUI from '@awcodes/alpine-floating-ui';
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm';

Alpine.plugin(focus);
Alpine.plugin(mask);

Alpine.plugin(AlpineFloatingUI);
Alpine.plugin(NotificationsAlpinePlugin);

Alpine.start();