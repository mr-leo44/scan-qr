<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .w-2\/4 {
            width: 50%;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .fixed {
            position: fixed;
        }

        .top-0 {
            top: 0;
        }

        .left-0 {
            left: 0;
        }

        .right-0 {
            right: 0;
        }

        .z-50 {
            z-index: 50;
        }

        .flex {
            display: flex;
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .text-md {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .max-w-md {
            min-width: 28rem;
        }

        .max-h-full {
            min-height: 100%;
        }

        .relative {
            position: relative;
        }

        .p-4 {
            padding: 1rem;
        }

        .w-full {
            width: 100%;
        }

        .h-auto {
            height: auto;
        }

        .max-h-auto {
            max-height: auto;
        }

        .flex-col {
            flex-direction: column;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem
        }

        @media (min-width:768px) {
            .md\:inset-0 {
                inset: 0px;
            }

            .md\:p-5 {
                padding: 1.25rem;
            }
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .text-center {
            text-align: center;
        }

        .my-6 {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .my-8 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .bg-cover {
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="mx-auto fixed top-0 right-0 left-0 z-50 flex justify-center items-center max-w-md md:inset-0">
        <div class="p-4 md:p-5 rounded-lg">
            <div class="max-h-auto mx-auto max-w-md flex-col justify-center">
                <div class="my-8">
                    <h3 class="font-semibold text-md text-center uppercase">QrCode généré de L'étudiant
                        {{ $attestation->student_name }}</h3>
                    <div class="my-6 text-center">
                        <img src="data:image/png;base64,{{ $qr_code }}" alt="QR Code"
                            class="mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
