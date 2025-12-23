// import './bootstrap';
import { Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import focus from '@alpinejs/focus';
import { createIcons, icons } from 'lucide';
import 'remixicon/fonts/remixicon.css';

window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.start();

createIcons({ icons });


