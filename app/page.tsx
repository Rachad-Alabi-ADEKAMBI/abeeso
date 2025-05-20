import Image from "next/image"
import Link from "next/link"
import { MenuCard } from "@/components/menu-card"
import { Button } from "@/components/ui/button"

export default function Home() {
  return (
    <div className="flex min-h-screen flex-col">
      {/* Hero Section */}
      <section className="relative flex flex-col items-center justify-center overflow-hidden bg-black py-20 text-center md:py-32">
        <div className="absolute inset-0 z-0 opacity-50">
          <Image src="/images/event-poster.jpeg" alt="African Cultural Event" fill className="object-cover" priority />
        </div>
        <div className="container relative z-10 mx-auto px-4">
          <h1 className="mb-4 font-serif text-5xl font-bold tracking-tight text-amber-400 md:text-7xl">
            ABEESO EKOLEKPAN
          </h1>
          <h2 className="mb-6 font-serif text-3xl font-light text-white md:text-4xl">Soirée Culturelle Africaine</h2>
          <p className="mb-8 text-xl text-white md:text-2xl">31 MAI 2025 | 20H - 02H | FONBEAUZARD</p>
          <div className="flex flex-col items-center justify-center gap-4 sm:flex-row">
            <Button size="lg" className="bg-purple-700 text-white hover:bg-purple-800">
              Réserver maintenant - 12€
            </Button>
            <Button
              variant="outline"
              size="lg"
              className="border-amber-400 text-amber-400 hover:bg-amber-400 hover:text-black"
            >
              Plus d'informations
            </Button>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section className="bg-gradient-to-b from-black to-purple-950 py-16 md:py-24">
        <div className="container mx-auto px-4">
          <h2 className="mb-12 text-center font-serif text-4xl font-bold text-amber-400 md:text-5xl">
            À propos de l'événement
          </h2>
          <div className="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div className="rounded-lg bg-black/50 p-6 text-white">
              <h3 className="mb-4 text-2xl font-bold text-amber-400">DJ Animation</h3>
              <p className="mb-4">
                Profitez d'une soirée animée par nos talentueux DJs: DJ Ricardo, Petit Miguelito, et Fofo Agnitode qui
                vous feront danser toute la nuit avec les meilleurs sons africains.
              </p>
            </div>
            <div className="rounded-lg bg-black/50 p-6 text-white">
              <h3 className="mb-4 text-2xl font-bold text-amber-400">Défilé de Mode</h3>
              <p className="mb-4">
                Découvrez les créations inspirées des cultures africaines lors de notre défilé de mode qui mettra en
                valeur les talents de créateurs locaux et internationaux.
              </p>
            </div>
            <div className="rounded-lg bg-black/50 p-6 text-white">
              <h3 className="mb-4 text-2xl font-bold text-amber-400">Danses Folkloriques</h3>
              <p className="mb-4">
                Immergez-vous dans la richesse culturelle africaine avec des performances de danses traditionnelles qui
                vous transporteront au cœur du continent.
              </p>
            </div>
          </div>
          <div className="mt-12 text-center">
            <p className="mx-auto max-w-3xl text-lg text-white">
              Rejoignez-nous pour une soirée inoubliable célébrant la culture africaine avec de la musique, de la danse,
              de la mode et une délicieuse sélection de boissons et de plats traditionnels.
            </p>
            <p className="mt-4 text-amber-400">
              <strong>Lieu:</strong> Rue Jean Mermoz 31140 FONBEAUZARD
            </p>
          </div>
        </div>
      </section>

      {/* Menu Section */}
      <section className="bg-purple-950 py-16 md:py-24">
        <div className="container mx-auto px-4">
          <h2 className="mb-2 text-center font-serif text-4xl font-bold text-amber-400 md:text-5xl">
            Carte des Boissons
          </h2>
          <p className="mb-12 text-center text-sm text-white">L'ABUS D'ALCOOL EST DANGEREUX POUR LA SANTE</p>

          <div className="grid gap-8 md:grid-cols-2">
            <div>
              <h3 className="mb-6 text-center text-2xl font-bold text-white">Sans Alcool</h3>
              <div className="space-y-4">
                <MenuCard name="Café" price="1€" />
                <MenuCard name="Eau 50cl" price="1€" />
                <MenuCard name="Jus de Fruits" price="2€" />
                <MenuCard name="Soda (Coca, Fanta)" price="2€" />
                <MenuCard name="Energy Drink / Panaché" price="3€" />
                <MenuCard name="Jus de Bissape" price="3€" />
                <MenuCard name="Jus de Gingembre" price="3€" />
              </div>
            </div>

            <div>
              <h3 className="mb-6 text-center text-2xl font-bold text-white">Avec Alcool</h3>
              <div className="space-y-4">
                <MenuCard name="Heineken" price="4€" />
                <MenuCard name="Desperados" price="4€" />
                <MenuCard name="Guinness" price="4€" />
                <MenuCard name="Vodka, Whisky" price="10€" />
                <MenuCard name="Vin Muscador" price="10€" />
                <MenuCard name="Formule" price="50€" special={true} />
              </div>
            </div>
          </div>

          <div className="mt-12 text-center">
            <p className="text-xl text-white">RESTAURATION SUR PLACE</p>
            <Button className="mt-6 bg-amber-400 text-black hover:bg-amber-500">Voir le menu complet</Button>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section className="bg-black py-16 md:py-20">
        <div className="container mx-auto px-4">
          <h2 className="mb-8 text-center font-serif text-4xl font-bold text-amber-400 md:text-5xl">Contact</h2>
          <div className="mx-auto max-w-md rounded-lg bg-purple-900/50 p-8">
            <div className="mb-6 text-center text-white">
              <p className="mb-2 text-xl font-bold">Réservations et Informations</p>
              <p className="text-lg">07.49.74.28.89 / 07.49.59.93.82</p>
            </div>

            <div className="mb-6 text-center text-white">
              <p className="mb-2 text-xl font-bold">Tarifs</p>
              <p className="text-lg">Prévente: 12€ | Sur place: 15€</p>
            </div>

            <div className="mb-6 text-center text-white">
              <p className="mb-2 text-xl font-bold">Adresse</p>
              <p className="text-lg">Rue Jean Mermoz 31140 FONBEAUZARD</p>
            </div>

            <div className="flex justify-center gap-4">
              <Button className="bg-purple-700 hover:bg-purple-800">Réserver par téléphone</Button>
            </div>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-black py-6">
        <div className="container mx-auto px-4">
          <div className="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <p className="text-sm text-gray-400">© 2025 Soirée Culturelle Africaine. Tous droits réservés.</p>
            <div className="flex gap-6">
              <Link href="#" className="text-sm text-amber-400 hover:underline">
                Mentions légales
              </Link>
              <Link href="#" className="text-sm text-amber-400 hover:underline">
                Contact
              </Link>
            </div>
          </div>
        </div>
      </footer>
    </div>
  )
}
