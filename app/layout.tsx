import type React from "react"
import "@/app/globals.css"
import { Inter, Playfair_Display } from "next/font/google"
import { cn } from "@/lib/utils"

const inter = Inter({
  subsets: ["latin"],
  variable: "--font-sans",
})

const playfair = Playfair_Display({
  subsets: ["latin"],
  variable: "--font-serif",
})

export const metadata = {
  title: "Soirée Culturelle Africaine | 31 Mai 2025",
  description:
    "Rejoignez-nous pour une soirée culturelle africaine exceptionnelle avec DJ animation, défilé de mode, danses folkloriques et restauration sur place.",
    generator: 'v0.dev'
}

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode
}>) {
  return (
    <html lang="fr" suppressHydrationWarning>
      <body className={cn("min-h-screen bg-background font-sans antialiased", inter.variable, playfair.variable)}>
        {children}
      </body>
    </html>
  )
}
