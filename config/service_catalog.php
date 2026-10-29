<?php

// Every service, grouped by category. Used by the service sliders, the home projects grid,
// the header menu and the appointment form's service dropdown.
// 'home' lists the services (by slug) shown in the home page slider.
// Images live in public/assets/images.
return [

    'categories' => [

        'Garden Maintenance' => [
            'garden-maintenance' => [
                'title' => 'Garden Maintenance',
                'image' => 'garden-maintenance.webp',
                'summary' => 'Scheduled garden care that keeps lawns, beds and planting healthy and tidy all year.',
            ],
            'lawn-mowing' => [
                'title' => 'Lawn Mowing',
                'image' => 'lawn-mowing.jpg',
                'summary' => 'Regular, even mowing and neat edges for a lawn that stays thick and green.',
            ],
            'shrub-trimming' => [
                'title' => 'Shrub Trimming',
                'image' => 'shrub-trimming.jpg',
                'position' => '72% center',
                'summary' => 'Careful shaping of shrubs and hedges for a neat look and healthy growth.',
            ],
            'tree-trimming' => [
                'title' => 'Tree Trimming',
                'image' => 'tree-trimming.jpg',
                'summary' => 'Safe pruning that keeps trees healthy, balanced and clear of buildings.',
            ],
            'tree-cutting' => [
                'title' => 'Tree Cutting',
                'image' => 'tree-cutting.jpg',
                'summary' => 'Controlled cutting and removal of unwanted, damaged or unsafe trees.',
            ],
            'power-washing' => [
                'title' => 'Power Washing',
                'image' => 'power-washing.jpg',
                'summary' => 'Deep cleaning for patios, driveways, walls and outdoor surfaces.',
            ],
        ],

        'Plant Care' => [
            'plant-care' => [
                'title' => 'Plant Care',
                'image' => 'plant-care.jpg',
                'summary' => 'Ongoing care for indoor and outdoor plants so they stay healthy and green.',
            ],
            'plant-doctor' => [
                'title' => 'Plant Doctor',
                'image' => 'plant-doctor.jpg',
                'summary' => 'Diagnosis and treatment for sick, struggling or pest-affected plants.',
            ],
            'plant-repotting' => [
                'title' => 'Plant Repotting',
                'image' => 'plant-repotting.jpg',
                'summary' => 'Moving plants into the right pots and fresh soil so they can keep growing.',
            ],
            'plant-watering' => [
                'title' => 'Plant Watering',
                'image' => 'plant-watering.jpg',
                'summary' => 'Reliable watering visits so your plants never go thirsty.',
            ],
            'plant-fertilizing' => [
                'title' => 'Plant Fertilizing',
                'image' => 'plant-fertilizing.jpg',
                'summary' => 'The right nutrients at the right time for stronger growth and better colour.',
            ],
            'plant-trimming' => [
                'title' => 'Plant Trimming',
                'image' => 'plant-trimming.jpg',
                'summary' => 'Neat trimming that keeps plants tidy, balanced and growing well.',
            ],
        ],

        'Design' => [
            'landscape-design' => [
                'title' => 'Landscape Design',
                'image' => 'landscape-design.jpg', // Photo: Maverick Frame on Unsplash
                'summary' => 'Custom outdoor designs planned around your space, lifestyle and budget.',
            ],
            'poolscape-design' => [
                'title' => 'Poolscape Design',
                'image' => 'poolscape-design.jpg',
                'summary' => 'Pool surroundings designed for comfort, style and easy maintenance.',
            ],
            'plantscape-design' => [
                'title' => 'Plantscape Design',
                'image' => 'plantscape-design.jpg',
                'summary' => 'Planting plans for homes, offices and commercial spaces, indoors and out.',
            ],
            'lighting-design' => [
                'title' => 'Lighting Design',
                'image' => 'lighting-design.jpg',
                'summary' => 'Outdoor lighting that adds atmosphere, safety and night-time beauty.',
            ],
        ],

        'Swimming Pools' => [
            'pool-technical-drawings' => [
                'title' => 'Technical Drawings',
                'image' => 'pool-technical-drawings.jpg',
                'summary' => 'Detailed technical drawings for structure, plumbing, filtration and equipment.',
            ],
            'pool-design-approvals' => [
                'title' => 'Pool Design & Approvals',
                'image' => 'pool-design-approvals.jpg',
                'summary' => 'Pool plans, site layout and the permits and approvals needed before work starts.',
            ],
            'swimming-pool-construction' => [
                'title' => 'Swimming Pool Construction',
                'image' => 'swimming-pool-construction.jpg',
                'summary' => 'New pools built and finished to your design, from excavation and tiling to the first fill.',
            ],
            'swimming-pool-maintenance' => [
                'title' => 'Swimming Pool Maintenance',
                'image' => 'swimming-pool-maintenance.jpg',
                'position' => '60% center',
                'summary' => 'Regular cleaning, water balancing and equipment checks for clear, safe water.',
            ],
        ],

        'Hardscape' => [
            'patios-decks' => [
                'title' => 'Patios & Decks',
                'image' => 'patios-decks.jpg',
                'summary' => 'Durable patios and decks that create comfortable outdoor living areas.',
            ],
            'walkways-pathways' => [
                'title' => 'Walkways & Pathways',
                'image' => 'walkways-pathways.jpg',
                'summary' => 'Well-built paths that connect your outdoor spaces safely and beautifully.',
            ],
            'outdoor-stairs' => [
                'title' => 'Outdoor Stairs',
                'image' => 'outdoor-stairs.jpg',
                'summary' => 'Safe, attractive steps for slopes, terraces and level changes.',
            ],
            'driveway-carports' => [
                'title' => 'Driveway and Carports',
                'image' => 'driveway-carports.jpg',
                'summary' => 'Strong driveways and shaded carports built for everyday use.',
            ],
        ],

        'Pergolas & Outdoor Living' => [
            'aluminum-pergolas-gazebos' => [
                'title' => 'Aluminum Pergolas & Gazebos',
                'image' => 'aluminum-pergolas.jpg',
                'summary' => 'Modern, low-maintenance aluminium shade structures for outdoor living.',
            ],
            'wooden-pergolas-gazebos' => [
                'title' => 'Wooden Pergolas & Gazebos',
                'image' => 'wooden-pergolas.jpg',
                'summary' => 'Warm, natural timber structures that add shade and character.',
            ],
            'outdoor-kitchens' => [
                'title' => 'Outdoor Kitchens',
                'image' => 'outdoor-kitchens.jpg',
                'summary' => 'Outdoor cooking and dining areas designed for entertaining.',
            ],
        ],

        'Irrigation, Grass & Green Walls' => [
            'irrigation-system-installation' => [
                'title' => 'Irrigation System Installation',
                'image' => 'irrigation.jpg',
                'summary' => 'Efficient automatic watering systems for lawns, beds and planters.',
            ],
            'natural-grass-installation' => [
                'title' => 'Natural Grass Installation',
                'image' => 'natural-grass.jpg',
                'summary' => 'Fresh natural lawns laid on properly prepared ground.',
            ],
            'artificial-grass-installation' => [
                'title' => 'Artificial Grass Installation',
                'image' => 'artificial-grass.jpg',
                'summary' => 'Green, low-maintenance lawns that look good all year.',
            ],
            'natural-green-walls' => [
                'title' => 'Natural Green Walls',
                'image' => 'natural-green-walls.jpg', // Photo: eran design on Unsplash
                'summary' => 'Living plant walls that bring greenery to walls and small spaces.',
            ],
            'artificial-green-walls' => [
                'title' => 'Artificial Green Walls',
                'image' => 'artificial-green-walls.jpg', // Photo: John Krach on Unsplash
                'summary' => 'Realistic green walls with no watering or upkeep needed.',
            ],
        ],

        'Additional Technical Services' => [
            'cctv-installation' => [
                'title' => 'CCTV Installation',
                'image' => 'cctv-installation.jpg', // Photo: Alan J. Hendry on Unsplash (Unsplash License)
                'summary' => 'Supply, installation and setup of CCTV cameras to keep your property safe.',
            ],
            'cctv-maintenance' => [
                'title' => 'CCTV Maintenance & Repair',
                'image' => 'cctv-maintenance.jpg',
                'position' => '30% center',
                'summary' => 'Servicing, repair and upgrades for existing cameras so your system keeps recording.',
            ],
            'garage-doors' => [
                'title' => 'Garage Door Installation',
                'image' => 'garage-doors.jpg',
                'position' => '40% center',
                'summary' => 'Supply, installation and repair of modern sectional and automatic garage doors.',
            ],
        ],

    ],

    'home' => [
        'swimming-pool-construction', 'swimming-pool-maintenance',
        'landscape-design', 'poolscape-design', 'aluminum-pergolas-gazebos',
        'garden-maintenance', 'lighting-design', 'irrigation-system-installation',
        'cctv-installation',
    ],

    // Extra services offered only in the appointment form dropdown (no service page).
    'form_only' => [
        'Other Services' => [
            'Home Maintenance', 'Electrical Work', 'Plumbing Services', 'AC Maintenance & Repair',
            'Carpentry Works', 'Painting Services', 'Masonry & Tiling Services',
        ],
    ],

];
