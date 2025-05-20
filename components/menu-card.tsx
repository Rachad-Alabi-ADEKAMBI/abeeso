import { cn } from "@/lib/utils"

interface MenuCardProps {
  name: string
  price: string
  special?: boolean
}

export function MenuCard({ name, price, special = false }: MenuCardProps) {
  return (
    <div
      className={cn(
        "flex items-center justify-between rounded-lg p-4",
        special ? "bg-amber-400 text-black" : "bg-black/30 text-white",
      )}
    >
      <span className="text-lg font-medium">{name}</span>
      <span
        className={cn(
          "rounded-full px-3 py-1 text-sm font-bold",
          special ? "bg-black text-amber-400" : "bg-purple-700 text-white",
        )}
      >
        {price}
      </span>
    </div>
  )
}
